<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'to', 'from', 'parent_id', 'body', 'status'
    ];
}