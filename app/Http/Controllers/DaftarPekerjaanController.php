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
        return view('buruh_tani.accepted.show', [
            'accept' => $accept
        ]);
    }
    public function store(Request $request, Vacancies $accept){ //bug kontol
        dd($accept);
        $validatedData = $request->validate([
            'deskripsi' => 'required|max:255',
            'image' => 'image|file|max:2048'
        ]);
        $validatedData['stat_vacancy_id'] = StatVacancies::where('vacancy_id', $accept->id)
                                                        ->where('user_id', auth()->user()->id)->get('id');
        $validatedData['image'] = $request->file('image')->store('report-images');

        Report::create($validatedData);
        return redirect('/buruhtani/accept');
    }
}