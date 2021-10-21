<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class IncidentFindings extends Model
{
    protected $casts = [
        'analysis' => 'array'
    ];

    use HasFactory;
    use SoftDeletes;
    protected $guarded = [

    ];

    public function fc()
    {
        return $this->hasOne(IncidentFactor::class,'id','incident_factor_id');
    }
}
