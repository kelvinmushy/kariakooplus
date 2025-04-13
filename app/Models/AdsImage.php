<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
    //
   

    protected $fillable = ['ad_id', 'image_path']; // Fillable fields

    public function ad()
    {
        return $this->belongsTo(Ad::class); // Define the relationship to Ad
    }

}
