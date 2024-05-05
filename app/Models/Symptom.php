<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    public $timestamps = false;

    protected $guarded = ['id', 'belief', 'disbelief'];
}
