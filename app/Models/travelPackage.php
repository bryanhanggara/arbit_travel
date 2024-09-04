<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class travelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'about',
        'featured_even',
        'language',
        'foods',
        'departure_date',
        'duration',
        'type',
        'price',
    ];

    protected $hidden = [

    ];
    public function galleries(){
        return $this->hasMany(Gallery::class,'travel_packages_id','id');
    }

    public function additionals(){
        return $this->hasMany(Additional::class,'travel_packages_id','id');
    }
}
