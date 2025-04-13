<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'stock',
        'image_url',
        'status',
        'slug',
        'subcategory_id',
        'brand_id',
        'product_condition',
        'product_description',
        'warranty'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(ProductModel::class);
    }

    public function adimages()
    {
        return $this->hasMany(\App\Models\AdsImage::class, 'ad_id');
    }
    // App\Models\Ad.php

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
