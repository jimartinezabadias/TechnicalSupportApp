<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = ['owner','model','trademark','type','user_id'];

    public function services(){

        return $this->hasMany('App\Models\Service');      

    }

    public function user(){

        return $this->belongsTo('App\Models\User');      

    }
}
