<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Vacancies;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StatVacancies;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function __construct() {
        $this->middleware('can:petani');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('petani.index', [
            'posts' => Vacancies::where('user_id', auth()->user()->id)->latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petani.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'salary' => 'required|integer',
            'body' => 'required',
            'address' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(Vacancies::class, 'slug', $request->title);    
        
        Vacancies::create($validatedData);
        
        return redirect('/petani/posts');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancies $post)
    {
        $waiting = StatVacancies::where('vacancy_id', $post->id)
                    ->where('status', false)->get();
        $accept = StatVacancies::where('vacancy_id', $post->id)
                    ->where('status', true)->get();

        return view('petani.show', [
            'post' => $post,
            'waiting' => $waiting,
            'accept' => $accept
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancies $post)
    {
        return view('petani.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancies $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];
        
        $validatedData = $request->validate($rules);
        
        $validatedData['slug'] = SlugService::createSlug(Vacancies::class, 'slug', $request->title);    
        
        $validatedData['user_id'] = auth()->user()->id;

        Vacancies::where('id', $post->id)->update($validatedData);

        StatVacancies::where('vacancy_id', $post->id)->delete();
            
        return redirect('/petani/posts')->with('status', 'Berhasil mengubah lowongan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancies $post)
    {
        Vacancies::destroy($post->id);

        return redirect('/petani/posts')->with('status', 'Berhasil menghapus lowongan!');
    }
}
