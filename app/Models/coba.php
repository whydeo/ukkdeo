<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coba extends Model
{
    use HasFactory;
    public $table = 'coba';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
