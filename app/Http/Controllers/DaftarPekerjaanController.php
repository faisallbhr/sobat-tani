<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Vacancies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StatVacancies;
use Illuminate\Support\Facades\Schema;

class DaftarPekerjaanController extends Controller
{
    public function __construct() {
        $this->middleware('can:buruh tani');
    }
    public function index(){
        $accepted = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('status', true)->get();

        $vacancies = array();
        foreach($accepted as $acc){
           array_push($vacancies, $acc->vacancy_id);
        }

        $vacancy = Schema::getColumnListing((new Vacancies())->getTable()); //mendapatkan kolom status pada tabel vacancies

        return view('buruh_tani.accepted.accepted', [
            'progress' => StatVacancies::whereIn('vacancy_id', $vacancies)
                                        ->where('user_id', auth()->user()->id)
                                        ->where('pengerjaan', false)
                                        ->where($vacancy[11], true)->get(),
            'done' => StatVacancies::whereIn('vacancy_id', $vacancies)
                                    ->where('user_id', auth()->user()->id)
                                    ->where('pengerjaan', true)
                                    ->where($vacancy[11], true)->get(),
        ]);
    }
    public function show(Vacancies $accept){
        $data = $accept->id;
        session()->put('data', $data); //mengirim id postingan ke controller store

        $stat_id = StatVacancies::where('user_id', auth()->user()->id)
                                ->where('vacancy_id', $accept->id)->get();
        session()->put('stat_vacancy_id', $stat_id[0]['id']); //mengirim id status vacancy ke controller store untuk update status pengerjaan di table statvacancy

        $counter = $stat_id[0]['pengerjaan'];
        if($counter){
            $vacancy_id = StatVacancies::where('vacancy_id',$data)->get();
            // dd($vacancy_id);
            $vacancies = array();
            foreach($vacancy_id as $vacancy){
            array_push($vacancies, $vacancy->id);
            }
            // dd($vacancies);
            $reports = Report::whereIn('stat_vacancy_id', $vacancies)->get();
            // dd($reports);
        }else{
            $reports = [];
        }
        
        return view('buruh_tani.accepted.show', [
            'accept' => $accept,
            'deadline' => $accept->deadline->format('d-m-Y'),
            'counter' => $counter,
            'reports' => $reports
        ])->with($data);
    }
    public function store(Request $request){
        $data = session()->get('data'); //mengambil id dari postingan
        $stat_id = session()->get('stat_vacancy_id');

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

        // update status pengerjaan menjadi selesai
        $stat_vacancy['pengerjaan'] = true;
        StatVacancies::where('id', $stat_id)->update($stat_vacancy);
        return redirect()->back()->with('status', 'Berhasil mengirim laporan');
    }
}