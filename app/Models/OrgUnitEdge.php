<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgUnitEdge extends Model
{
    protected $fillable = ['from_org_unit_id','to_org_unit_id','edge_type'];
}
