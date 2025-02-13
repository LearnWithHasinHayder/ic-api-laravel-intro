<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
