<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatVacancies extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vacancy(){
        return $this->belongsTo(Vacancies::class);
    }
    public function report(){
        return $this->hasMany(Report::class);
    }
}
