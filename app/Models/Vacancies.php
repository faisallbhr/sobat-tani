<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['user', 'category'];
    protected $guarded = ['id'];
    protected $dates = ['deadline'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function stat_vacancy(){
        return $this->hasMany(StatVacancies::class);
    }
    public function address(){
        return $this->belongsTo(Village::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
