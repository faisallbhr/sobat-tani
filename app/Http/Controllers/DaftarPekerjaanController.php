<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'acc' => $accept,
            'check_post' => StatVacancies::where('vacancy_id', $accept->id)->get(),
            'check_user' => User::where('id', auth()->user()->id)->get('id'),
            'counter' => true
        ]);
    }
}