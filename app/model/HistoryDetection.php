<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HistoryDetection extends Model
{
    protected $table = 'history_detection';

    protected $fillable = ['username', 'tweet', 'class', 'classification', 'name', 'description', '	profile_image_url', 'profile_banner_url'];
}
