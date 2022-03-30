<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Meja;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function meja(){
        return $this->belongsTo(Meja::class,'meja_id');
    }
    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
