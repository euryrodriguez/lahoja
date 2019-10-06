<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facultad extends Model
{
    use SoftDeletes;

    protected $table = 'faculties';
    protected $fillable = ['name'];
}
