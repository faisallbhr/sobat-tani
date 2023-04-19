<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use App\Models\Vacancies;
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
    public function create(Request $request)
    {        
        return view('petani.create', [
            'categories' => Category::all(),
            'provinces' => Province::all(),
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
            'salary' => 'required|numeric',
            'address_id' => 'required',
            'body' => 'required|',
            'address_detail' => 'max:255'
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
            'categories' => Category::all(),
            'provinces' => Province::all(),
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
            'salary' => 'required|numeric',
            'address_id' => 'required',
            'body' => 'required|max:255',
            'address_detail' => 'max:255'
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
    public function getregency(Request $request)
    {
        $provinceId = $request->provinceId;
        $regencies = Regency::where('province_id', $provinceId)->get();
        echo "<option>Pilih kabupaten/kota ...</option>";
        foreach($regencies as $regency){
            echo "<option value='$regency->id'> $regency->name</option>";
        }
    }
    public function getdistrict(Request $request)
    {
        $regencyId = $request->regencyId;
        $districts = District::where('regency_id', $regencyId)->get();
        echo "<option>Pilih kecamatan ...</option>";
        foreach($districts as $district){
            echo "<option value='$district->id'> $district->name</option>";
        }
    }
    public function getvillage(Request $request)
    {
        $districtId = $request->districtId;
        $villages = Village::where('district_id', $districtId)->get();
        echo "<option>Pilih desa ...</option>";
        foreach($villages as $district){
            echo "<option value='$district->id'> $district->name</option>";
        }
    }
}
