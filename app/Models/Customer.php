<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    // protected $timestamps = false;
    protected $fillable = ['email', 'fullname', 'phone', 'address', 'note'];
    // protected $hidden = [''];
    public function bill(){
        return $this->hasOne(Bill::class, "customer_id", "id");
    }
}