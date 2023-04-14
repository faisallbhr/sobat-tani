<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatVacancies extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->hasMany(User::class);
    }
    public function vacancies(){
        return $this->belongsTo(Vacancies::class);
    }
}
