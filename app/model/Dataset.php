<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $table = 'datasets';

    protected $fillable = ['class', 'text'];
}
