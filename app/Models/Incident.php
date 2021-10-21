<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SearchTrait;

class Incident extends Model
{
    use HasFactory;
    use SearchTrait;
    use SoftDeletes;
    protected $guarded = [

    ];
    protected $casts = [
        'vehicles' => 'array',
        'staff' => 'array',
        'photos' => 'array',
        'evidence' => 'array',
    ];
    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function finding()
    {
        return $this->hasMany(IncidentFindings::class,'incident_id','id');
    }
}
