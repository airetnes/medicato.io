<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'to', 'from', 'parent_id', 'body', 'status'
    ];
    
    public function scopeCountNewMessage() {
        return $this->where('status',0)
            ->where('from', \Auth::user()->id)
            ->get();
    }
}