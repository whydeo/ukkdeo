<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;
use App\Models\meja;
use App\Models\order;

class meja extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function pesanan(){
        return $this->hasMany(Pesanan::class);

    }
    public function order(){
        return $this->hasMany(order::class);
    }
}