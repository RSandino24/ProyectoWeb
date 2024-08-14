<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'price',
        'stock',
        'brand',
        'img_url',
        'category_id',
    ];

    //Filtrar las categorías
    public function scopeSearch($query,$search){
        if($search){
            return $query->where(function ($query) use ($search) {
                $query->whereIn('category_id', $search);
            });
        }

        return $query;
    }

    //Relación de uno a uno en categorías
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
