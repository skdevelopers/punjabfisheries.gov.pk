<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Module registry to help generate permissions like "hm.hatchery.read" */
class Module extends Model
{
    protected $fillable = ['code','name'];
}
