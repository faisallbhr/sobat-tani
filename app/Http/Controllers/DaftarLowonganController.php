<?php

namespace App\Http\Controllers;

use App\Models\StatVacancies;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class DaftarLowonganController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        // $vacancy = StatVacancies::where('vacancy_id', )
        $waiting = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', false)->get();

        foreach($waiting as $wait){
            $vacancies = $wait->vacancy_id;
        }

        return view('buruh_tani.index', [
            'waiting' => Vacancies::where('id', $vacancies)->get()
        ]);
    }
}
