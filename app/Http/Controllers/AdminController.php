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
        $posts = Vacancies::where('status', true)
                            ->where('deadline', '<', now())->get();
        return view('admin.index', [
            'posts' => $posts
        ]);
    }
    public function show(Vacancies $post){
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
        Invoice::destroy('vacancies_id', $post->id);
        return redirect()->back()->with('status', 'Berhasil menolak bukti pembayaran');
    }
}
