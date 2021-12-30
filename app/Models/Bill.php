<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";
    // protected $timestamps = false;
    protected $fillable = ['customer_id', 'total', 'status', 'date_order'];
    // protected $hidden = [''];
    public function customer(){
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }

    public function bill_detail(){
        return $this->hasMany(Bill_Detail::class, "bill_id", "id");
    }
}