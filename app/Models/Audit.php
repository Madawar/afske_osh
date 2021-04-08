<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function AuditItems()
    {
        return $this->hasMany(AuditItem::class);
    }

    public function dep()
    {
        return $this->hasOne(Department::class,'id','department');
    }

    public function audited()
    {
        return $this->hasOne(User::class,'id','auditee');
    }
}
