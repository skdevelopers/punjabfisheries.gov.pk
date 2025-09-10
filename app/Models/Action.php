<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Action verbs registry (read, create, update, approve, etc.) */
class Action extends Model
{
    protected $fillable = ['code','name','description','sort_order'];
}
