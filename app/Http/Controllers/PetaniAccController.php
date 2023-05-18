<?php

namespace App\Http\Controllers;

use App\Models\StatVacancies;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class PetaniAccController extends Controller
{
    public function __construc() {
        $this->middleware('can:petani');
    }    
    public function update(Request $request, StatVacancies $wait)
    {          
        $data['status'] = true;

        StatVacancies::where('id', $wait->id)->update($data);
        return redirect()->back()->with('status', 'Berhasil menerima pekerja!');            
    }
    public function destroy(StatVacancies $wait){
        StatVacancies::destroy($wait->id);
        return redirect()->back()->with('status', 'Berhasil menolak pekerja!');
    }
}
