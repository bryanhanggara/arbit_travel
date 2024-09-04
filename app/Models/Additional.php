<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_packages_id',
        'judul',
        'image',
        'about',
    ];

    public function travel_pack(){
        return $this -> belongsTo(travelPackage::class, 'travel_packages_id','id');
    }
}
