<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\DataFeed;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{

    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // BURUH TANI START
        $regis_vacancy = StatVacancies::where('user_id', auth()->user()->id)
                        ->where('status', false)->get();
        $acc_vacancy = StatVacancies::where('user_id', auth()->user()->id)
                        ->where('status', true)->get();
        // BURUH TANI END

        // PETANI START
        $vacancies = Vacancies::where('user_id', auth()->user()->id)->get();
        $vacancy_id = array();
        foreach($vacancies as $i){
            array_push($vacancy_id, $i->id);
        }
        $registered = StatVacancies::whereIn('vacancy_id', $vacancy_id)
                                    ->where('status', false)->get();
        $accepted = StatVacancies::whereIn('vacancy_id', $vacancy_id)
                                    ->where('status', true)->get();
        // PETANI END

        
        return view('pages.dashboard.dashboard', [
            'vacancies' => count($vacancies),
            'registered' => count($registered),
            'accepted' => count($accepted),
            'regis_vacancy' => count($regis_vacancy),
            'acc_vacancy' => count($acc_vacancy),
        ]);
    }
}
