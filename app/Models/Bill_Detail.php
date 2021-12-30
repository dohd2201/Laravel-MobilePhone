<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    use HasFactory;
    // protected $timestamps = false;
    protected $fillable = ['bill_id', 'product_id', 'qtt', 'price'];
    // protected $hidden = [''];
    public function bill(){
        return $this->belongsTo(Bill::class, "bill_id", "id");
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    
}