<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;

class DaftarLowonganController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        $waiting = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', false)->get();

        $vacancies = array();
        foreach($waiting as $wait){
           array_push($vacancies, $wait->vacancy_id);
        }
        return view('buruh_tani.waiting.waiting', [
            'waiting' => Vacancies::whereIn('id', $vacancies)->get()
        ]);
    }
    public function show(Vacancies $wait){
        return view('buruh_tani.waiting.show', [
            'wait' => $wait,
            'check_post' => StatVacancies::where('vacancy_id', $wait->id)->get(),
            'check_user' => User::where('id', auth()->user()->id)->get('id'),
            'counter' => true
        ]);
    }
}