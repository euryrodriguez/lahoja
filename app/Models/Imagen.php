<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
    use SoftDeletes;

    protected $table = 'images';
    protected $fillable = ['filename', 'universityId'];
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function universities(){
        return $this->belongsTo('App\Models\Universidad', 'universities.id', 'universityId');
    }
}
