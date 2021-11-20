<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\Family;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Tags\HasTags;

class Donee extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, HasTags, Auditable;

    public $fillable = ['slug', 'firstname', 'lastname', 'description', 'age', 'gender'];

    /**
     * Set the route key name to slug
     * 
     * @return string
     */
    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function getFirstnameAttribute($value)
    {
        return sprintf('[%s] %s', $this->slug, $value);
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
     * A donee may belong to a family
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function family() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    /**
     * A donee may have many wishlists
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
