<?php

namespace App\Models;

use App\Models\StatVacancies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function stat_vacancy(){
        return $this->hasMany(StatVacancies::class);
    }
}