<?php

namespace App\Http\Controllers;

use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;

class DaftarPekerjaanController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        $waiting = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)->get();

        $vacancies = array();
        foreach($waiting as $wait){
           array_push($vacancies, $wait->vacancy_id);
        }

        return view('buruh_tani.acc.index', [
            'waiting' => Vacancies::whereIn('id', $vacancies)->get()
        ]);
    }
    public function show(){
        
    }
}