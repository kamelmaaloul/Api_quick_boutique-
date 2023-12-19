<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'discount',
        'quantite',
        'images',
        'cover',
        'is_active',
    ];

    public function order_details (){
        return $this->hasMany(OrderDetail::class);
    }
    public function categories (){
        return $this->belongsTo(Category::class);
    }
}
