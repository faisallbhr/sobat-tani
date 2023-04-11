<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    use HasFactory;

    protected $with = ['user', 'category'];
    protected $guarded = ['id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function statVacancies(){
        return $this->hasMany(StatVacancies::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
