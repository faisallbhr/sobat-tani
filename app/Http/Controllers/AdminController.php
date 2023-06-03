<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin');
    }
    public function index(){
        $posts = Vacancies::paginate(10);
        return view('admin.posts', [
            'posts' => $posts
        ]);
    }
    public function show(Vacancies $post){
        return view('admin.posts-show', [
            'post' => $post
        ]);
    }
    public function indexPayment(){
        $posts = Vacancies::where('status', true)
                            ->where('deadline', '<', now())->get();
        return view('admin.index', [
            'posts' => $posts
        ]);
    }
    public function showPayment(Vacancies $post){
        $accept = StatVacancies::where('vacancy_id', $post->id)
                                ->where('status', true)->get();
        
        return view('admin.show', [
            'post' => $post,
            'accept' => $accept,
            'invoice' => $post->invoice
        ]);
    }
    public function update(Vacancies $post){
        Invoice::where('vacancies_id', $post->id)->update(['status' => true]);
        return redirect()->back()->with('status', 'Berhasil menerima bukti pembayaran');
    }
    public function destroy(Vacancies $post){
        Invoice::where('vacancies_id', $post->id)->delete();
        return redirect()->back()->with('status', 'Berhasil menolak bukti pembayaran');
    }
}
