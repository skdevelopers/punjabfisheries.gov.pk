<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** @property int $id @property string $name @property int $division_id */
class District extends Model
{
    protected $fillable = ['division_id','name'];
}
