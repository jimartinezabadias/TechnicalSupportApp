<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = ['failure','date','price','failure_description','service_description'];

    public function machine(){

        return $this->belongsTo('App\Models\Machine');

    }
}
