<?php

namespace App\Http\Controllers;

use App\Models\StatVacancies;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.welcome', [
            'posts' => Vacancies::latest()->paginate(10)
        ]);
    }
    public function show(Vacancies $post)
    {
        $check_id = User::where('id', auth()->user()->id)->get('id');
        // dd($post->id);
        $cek_user = StatVacancies::where('user_id', $check_id[0]['id'])->get('id');
        $cek_post = StatVacancies::where('post_id', $post->user_id)->get();
        // dd($cek_post);
        // if(empty($registered)){
        //     dd('kosong');
        // }else{
        //     dd('ada isinya');
        // }
        
        return view('users.show', [
            'post' => $post,
            // 'registered' => DaftarLowongan::where('user_id', $check_id[0]['id'])->andWhere('post_id', $post->id)->get()
        ]);
    }
    public function store(Vacancies $post){
        $user = User::where('id', auth()->user()->id)->get('id');
        $data = [
            'user_id' => $user[0]['id'],
            'post_id' => $post->id,
            'status' => false
        ];
        StatVacancies::create($data);
        return redirect()->back()->with('status', 'Berhasil daftar lowongan');
    }
}
