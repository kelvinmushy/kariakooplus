<?php
// app/Models/ProductModel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name', 'slug', 'specifications'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
