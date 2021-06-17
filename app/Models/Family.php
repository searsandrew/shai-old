<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Family extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    /**
     * A family belongs to many donees
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function donees() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Donee::class);
    }
}
