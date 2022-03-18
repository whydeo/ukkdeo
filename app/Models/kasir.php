<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    use HasFactory;
    public $table = 'kasir';
    protected $primaryKey = 'id_kasir';
    protected $guarded = [];
}
