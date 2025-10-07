<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** @property int $id @property string $name @property int $district_id */
class Tehsil extends Model
{
    protected $fillable = ['district_id','name'];
}
