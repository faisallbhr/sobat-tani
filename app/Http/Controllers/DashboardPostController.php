<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function __construct() {
        $this->middleware('can:petani');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
            'slug' => 'required|unique:vacancies',
            'category_id' => 'required',
            'salary' => 'required|integer',
            'body' => 'required',
            'address' => 'required'
        ]);
        // dd($validatedData);

        $validatedData['user_id'] = auth()->user()->id;


        Vacancies::create($validatedData);

        return redirect('/petani/posts');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancies $post)
    {
        return view('petani.show', [
            'post' => $post
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

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:vacancies';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Vacancies::where('id', $post->id)
            ->update($validatedData);

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
