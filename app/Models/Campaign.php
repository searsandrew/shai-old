<?php

namespace App\Models;

use App\Models\Donee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Campaign extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    public $fillable = ['name', 'description', 'design', 'started_at', 'ended_at', 'slug'];

    /**
     * Set the route key name to slug
     * 
     * @return string
     */
    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    /**
     * A campaign belongs to many donees
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function donees() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Donee::class);
    }
}
