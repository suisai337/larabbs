<?php

namespace App\Models;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
