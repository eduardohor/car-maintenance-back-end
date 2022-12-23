<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'brand',
        'model',
        'version',
        'plate'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
