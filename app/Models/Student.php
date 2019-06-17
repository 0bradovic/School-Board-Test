<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name'];

    public function marks()
    {
        $this->hasMany('App\Models\Mark');
    }
}
