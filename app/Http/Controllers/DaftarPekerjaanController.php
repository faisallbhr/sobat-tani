<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;

class DaftarPekerjaanController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        $accepted = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)->get();

        $vacancies = array();
        foreach($accepted as $acc){
           array_push($vacancies, $acc->vacancy_id);
        }
        return view('buruh_tani.accepted.accepted', [
            'accepted' => Vacancies::whereIn('id', $vacancies)->get()
        ]);
    }
    public function show(Vacancies $accept){
        $data = $accept->id;
        session()->put('data', $data); //mengirim id postingan ke controller store
        return view('buruh_tani.accepted.show', [
            'accept' => $accept
        ])->with($data);
    }
    public function store(Request $request){
        $data = session()->get('data'); //mengambil id dari postingan

        $validatedData = $request->validate([
            'deskripsi' => 'required|max:255',
            'image' => 'required|image|file|max:2048'
        ]);
        $vacancy_id = StatVacancies::where('vacancy_id', $data)
                            ->where('user_id', auth()->user()->id)->get();
        $vacancy_id = $vacancy_id[0]['id'];
        $validatedData['stat_vacancy_id'] = $vacancy_id;
        $validatedData['image'] = $request->file('image')->store('report-images');

        Report::create($validatedData);
        return redirect()->back()->with('status', 'Berhasil mengirim laporan');
    }
}