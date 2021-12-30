<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    // protected $timestamps = false;
    protected $fillable = ['name', 'email', 'product_id', 'content'];
    // protected $hidden = [''];
    public function product(){
       return $this->belongsTo(Product::class, "product_id", "id");
    }
}