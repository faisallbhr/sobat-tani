<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\Invoice;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use App\Models\StatVacancies;
use Illuminate\Support\Facades\Auth;
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
                                        ->where('status', true)->get(),

            'done' => StatVacancies::whereIn('vacancy_id', $vacancies)
                                    ->where('user_id', auth()->user()->id)
                                    ->where('pengerjaan', true)
                                    ->where('status', true)->get(),
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

            $vacancies = array();
            foreach($vacancy_id as $vacancy){
            array_push($vacancies, $vacancy->id);
            }

            $reports = Report::whereIn('stat_vacancy_id', $vacancies)->get();

        }else{
            $reports = [];
        }
        $invoices = Invoice::where('vacancies_id', $accept->id)->get();
        if(count($invoices)>0){
            $invoice = Invoice::where('vacancies_id', $accept->id)->get();
        }else{
            $invoice = [];
        }
        return view('buruh_tani.accepted.show', [
            'accept' => $accept,
            'deadline' => $accept->deadline->format('d-m-Y'),
            'counter' => $counter,
            'reports' => $reports,
            'invoice' =>$invoice
        ])->with($data);
    }
    public function store(Request $request){        
        // dd($accept);
        $data = session()->get('data'); //mengambil id dari postingan
        $stat_id = session()->get('stat_vacancy_id');
        $rules = \Validator::make($request->all(),[
            'deskripsi' => 'required|max:255',
            'image' => 'required|image'
        ]);
        $reports = Report::all();
        $report_id = array();
        $user_report_id = array();
        $vacancy_report_id = array();
        foreach($reports as $i => $report){
            array_push($report_id, $reports[$i]->id);
            array_push($user_report_id, $reports[$i]->stat_vacancy->user_id);
            array_push($vacancy_report_id, $reports[$i]->stat_vacancy->vacancy_id);
        }

        if(in_array(Auth::user()->id, $user_report_id) && in_array($data, $vacancy_report_id)){
            if($rules->fails()){
                return redirect()->back()->with('failed', 'Gagal memperbarui laporan, mohon isi laporan dengan benar!');
            }else{
                Report::where('stat_vacancy_id', $stat_id)->delete();
                $validatedData = $request->validate([
                    'deskripsi' => 'required|max:255',
                    'image' => 'required|image'
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
                return redirect()->back()->with('status', 'Berhasil mengubah laporan');
            }
        }
        if($rules->fails()){
            return redirect()->back()->with('failed', 'Gagal mengirim laporan, mohon isi laporan dengan benar!');
        }else{
            $validatedData = $request->validate([
                'deskripsi' => 'required|max:255',
                'image' => 'required|image'
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
}