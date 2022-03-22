<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    public $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $guarded = [];
}

