<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\DataFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            if(Gate::allows('admin') || Gate::allows('petani post')){
                return view('pages.dashboard.dashboard', [
                    'posts' => Post::where('user_id', auth()->user()->id)->paginate(7)
                ]);
            }
            return abort(403);
        }
    }
