<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\pesan;
class menu extends Model
{
    use HasFactory;
    public $table = 'menu';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
    public function pesan()
    {
        return $this->hasMany(pesan::class);
    }

}
