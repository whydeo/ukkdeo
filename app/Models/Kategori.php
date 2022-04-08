<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\order;
class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function menu(){
        return $this->hasMany(Menu::class);
    }
    public function order(){
        return $this->hasMany(order::class);
    }
}
