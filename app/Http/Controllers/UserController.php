<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('users.welcome', [
            'posts' => Vacancies::where('status', false)->latest()->paginate(12)
        ]);
    }
    public function show(Vacancies $post)
    {
        if(Auth::user()){
            if($post->status){
                abort(403);
            }
            else{
                return view('users.show', [
                    'post' => $post,
                    'check_post' => StatVacancies::where('vacancy_id', $post->id)->get(),
                    'check_user' => User::where('id', auth()->user()->id)->get('id'),
                    'counter' => true
                ]);
            }
        }else{
            return view('users.show', [
                'post' => $post,
            ]);
        }
    }
    public function store(Vacancies $post){
        $user = User::where('id', auth()->user()->id)->get('id');
        $data = [
            'user_id' => $user[0]['id'],
            'vacancy_id' => $post->id,
            'status' => false
        ];
        StatVacancies::create($data);
        return redirect()->back()->with('status', 'Berhasil daftar lowongan');
    }
}
