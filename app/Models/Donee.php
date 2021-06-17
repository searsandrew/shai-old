<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Tags\HasTags;

class Donee extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, HasTags, Auditable;

    public $fillable = ['name', 'description', 'slug'];

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
     * User who selected donee
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * A donee belongs to many campaigns
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function campaigns() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Campaign::class);
    }

    /**
     * A donee may belong to many families
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function families() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Family::class);
    }
}
