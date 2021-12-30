<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    // protected $timestamps = false;
    protected $fillable = ['name','code','slug','price','image','warranty','accessories','condition','promotion','status','description','featured','categories_id'];
    // protected $hidden = [''];
    public function category(){
        return $this->belongsTo(Category::class, "categories_id", "id");
    }

    public function comment(){
        return $this->hasMany(Comment::class, "product_id", "id");
    }

    public function bill_detail(){
        return $this->hasMany(Bill_Detail::class, "product_id", "id");
    }
}