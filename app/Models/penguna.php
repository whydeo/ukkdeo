<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penguna extends Model
{
    use HasFactory;
    public $table = 'penguna';
    protected $primaryKey = 'id_penguna';
    protected $guarded = [];
}
