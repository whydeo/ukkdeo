<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function meja()
    {
        return $this->belongsTo(meja::class,'id_meja');
    }
    public function menu()
    {
        return $this->belongsTo(menu::class,'id_menu');
    }
 
}
