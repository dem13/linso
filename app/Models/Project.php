<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'desc'];

    protected $perPage = 5;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
