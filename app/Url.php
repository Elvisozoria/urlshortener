<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['original_url', 'short_url', 'title', 'hits', 'user_id'];
}
