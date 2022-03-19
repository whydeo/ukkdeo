<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class manager extends Model
{
    use HasFactory, HasRoles;
    public $table = 'manager';
    protected $primaryKey = 'id_manager';
    protected $guarded = [];
}
