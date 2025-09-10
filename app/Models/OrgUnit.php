<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrgUnit extends Model
{
    protected $fillable = ['name','code','type','parent_id','grade_code','headcount','sort_order'];

    /**
     * Return parent IDs this user is scoped to (including descendants).
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Return children IDs this user is scoped to (including descendants).
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class,  'parent_id');
    }
}
