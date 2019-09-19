<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }
}
