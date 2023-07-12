<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'subCategory_id',
        'image',
        'price',
        'size',
        'stock',
     ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }
    public function varients(){
        return $this->hasMany(Varient::class,'product_id');
    }
}
