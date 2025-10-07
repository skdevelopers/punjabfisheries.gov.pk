<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** @property int $id @property string $name */
class Division extends Model
{
    protected $fillable = ['name'];
}
