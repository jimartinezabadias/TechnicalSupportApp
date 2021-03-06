<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'machine_id',
        'failure',
        'date',
        'price',
        'failure_description',
        'service_description',
        'service_image',
    ];

    public function machine(){

        return $this->belongsTo('App\Models\Machine');

    }

    public function getServiceImagePathAttribute(){
        return Storage::url($this->service_image);
    }
}
