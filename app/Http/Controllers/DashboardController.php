<?php


namespace App\Http\Controllers;

use App\Models\BookKeeping;
use App\Models\Invoice;
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
                                        ->where('status', false)
                                        ->where('pengerjaan', false)->get();

        $acc = StatVacancies::where('user_id', auth()->user()->id)
                            ->where('status', true)
                            ->where('pengerjaan', false)->get();

        $progress_id = array();
        foreach ($acc as $i => $progress){
            array_push($progress_id, $acc[$i]->vacancy->id);
        }
        $acc_vacancy = Vacancies::whereIn('id', $progress_id)
                                    ->where('status', false)->get();
        
        $progress = StatVacancies::where('user_id', auth()->user()->id)
                                    ->where('status', true)
                                    ->where('pengerjaan', false)->get();
        $count_progress = array();
        foreach($progress as $i){
            if($i->vacancy->status){
                array_push($count_progress, $i);
            }
        }

        $done = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)
                                ->where('pengerjaan', true)->get();
        // BURUH TANI END


        // PETANI START
        $vacancies_open = Vacancies::where('user_id', auth()->user()->id)
                                ->where('status', false)->get();
        $vacancies_closed = Vacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)->get();
        // $books = BookKeeping::where('user_id', auth()->user()->id)->get();
        $books = BookKeeping::whereMonth('date', now()->month)->sum('cost');
        // PETANI END

        // ADMIN START
        $posts = Vacancies::where('status', true)
                        ->where('deadline', '<', now())->get();
        $post_wait = array();
        $post_acc = array();
        foreach($posts as $post){
            if($post->invoice->status){
                array_push($post_acc, $post->id);
            }else{
                array_push($post_wait, $post->id);
            }
        }
        $admin_acc = Vacancies::whereIn('id', $post_acc)->get();
        $admin_wait = Vacancies::whereIn('id', $post_wait)->get();
        $profit = Invoice::where('status', true)
                        ->whereMonth('created_at', now()->month)->sum('profit');
        // ADMIN END

        return view('pages.dashboard.dashboard', [
            'regis_vacancy' => count($regis_vacancy),
            'acc_vacancy' => count($acc_vacancy),
            'progress' => count($count_progress),
            'done' => count($done),
            'vacancies_open' => count($vacancies_open),
            'vacancies_closed' => count($vacancies_closed),
            'books' => ($books),
            'admin_acc' => ($admin_acc),
            'admin_wait' => count($admin_wait),
            'profit' => $profit,
            'jan' => Invoice::whereMonth('created_at', '1')->sum('profit'),
            'feb' => Invoice::whereMonth('created_at', '2')->sum('profit'),
            'mar' => Invoice::whereMonth('created_at', '3')->sum('profit'),
            'apr' => Invoice::whereMonth('created_at', '4')->sum('profit'),
            'mei' => Invoice::whereMonth('created_at', '5')->sum('profit'),
            'jun' => Invoice::whereMonth('created_at', '6')->sum('profit'),
            'jul' => Invoice::whereMonth('created_at', '7')->sum('profit'),
            'aug' => Invoice::whereMonth('created_at', '8')->sum('profit'),
            'sep' => Invoice::whereMonth('created_at', '9')->sum('profit'),
            'oct' => Invoice::whereMonth('created_at', '10')->sum('profit'),
            'nov' => Invoice::whereMonth('created_at', '11')->sum('profit'),
            'dec' => Invoice::whereMonth('created_at', '12')->sum('profit'),
        ]);
    }
}
