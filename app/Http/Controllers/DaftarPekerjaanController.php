<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Vacancies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StatVacancies;

class DaftarPekerjaanController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        $progress = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)
                                ->where('pengerjaan', false)->get();
        $done = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)
                                ->where('pengerjaan', true)->get();

        $vacancies_progress = array();
        foreach($progress as $acc){
           array_push($vacancies_progress, $acc->vacancy_id);
        }
        $vacancies_done = array();
        foreach($progress as $acc){
           array_push($vacancies_done, $acc->vacancy_id);
        }
        return view('buruh_tani.accepted.accepted', [
            'progress' => Vacancies::whereIn('id', $vacancies_progress)->get(),
            'done' => Vacancies::whereIn('id', $vacancies_done)->get(),
        ]);
    }
    public function show(Vacancies $accept){
        $data = $accept->id;
        session()->put('data', $data); //mengirim id postingan ke controller store
        $deadline = $accept->deadline;

        return view('buruh_tani.accepted.show', [
            'accept' => $accept,
            'dl_tgl' => $deadline,
            'dl_jam' => $deadline,
        ])->with($data);
    }
    public function store(Request $request){
        $data = session()->get('data'); //mengambil id dari postingan

        $validatedData = $request->validate([
            'deskripsi' => 'required|max:255',
            'image' => 'required|image|file|max:2048'
        ]);
        $vacancy_id = StatVacancies::where('vacancy_id', $data)
                            ->where('user_id', auth()->user()->id)->get();
        $vacancy_id = $vacancy_id[0]['id'];
        $validatedData['stat_vacancy_id'] = $vacancy_id;
        $validatedData['image'] = $request->file('image')->store('report-images');

        Report::create($validatedData);
        return redirect()->back()->with('status', 'Berhasil mengirim laporan');
    }
}