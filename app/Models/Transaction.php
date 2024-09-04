<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TransactionsDetails;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id',
        'users_id',
        'additional_visa',
        'additional_flight',
        'transactions_total',
        'transactions_status',
    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasMany(TransactionsDetails::class, 'transactions_id','id');
    }

    public function travel_packages(){
        return $this->belongsTo(travelPackage::class,'travel_packages_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}
