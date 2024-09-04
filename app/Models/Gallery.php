<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\travelPackage;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id',
        'image',
    ];

    protected $hidden = [

    ];

    public function travel_packages(){
        return $this -> belongsTo(travelPackage::class, 'travel_packages_id','id');
    }
}
