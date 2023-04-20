<?php


namespace App\Http\Controllers;

use App\Models\StatVacancies;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\DataFeed;
use App\Models\Vacancies;
use Illuminate\Http\Request;
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
            $vacancies = Vacancies::where('user_id', auth()->user()->id)->get();
            $vacancy_id = array();
            foreach($vacancies as $i){
                array_push($vacancy_id, $i->id);
            }
            $registered = StatVacancies::whereIn('vacancy_id', $vacancy_id)
                                        ->where('status', false)->get();
            $accepted = StatVacancies::whereIn('vacancy_id', $vacancy_id)
                                        ->where('status', true)->get();
            return view('pages.dashboard.dashboard', [
                'vacancies' => count($vacancies),
                'registered' => count($registered),
                'accepted' => count($accepted)
            ]);
        }
    }
