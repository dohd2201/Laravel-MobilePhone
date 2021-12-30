<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    // protected $timestamps = false;
    protected $fillable = ['name', 'slug'];
    // protected $hidden = [''];
    public function product(){
        return $this->hasMany(Product::class, "categories_id", "id");
    }
}