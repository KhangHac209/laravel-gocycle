<?php

namespace App\Models\Admin;

use App\Models\Admin\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product';
    protected $guarded = [];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id')->withTrashed();
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
}
