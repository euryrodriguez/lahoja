<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Universidad extends Model
{
    use SoftDeletes;

    protected $table = 'universities';
    protected $fillable = ['name', 'acronym', 'width', 'height'];

    public function images()
    {
        return $this->hasMany('App\Models\Imagen', 'universityId', 'id');
    }
}
