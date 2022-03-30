<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\menu;
class Pesan extends Model
{
    use HasFactory;
    public $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $guarded = [];

    public function menu()
{
    return $this->hasMany(menu::class);
}
}
