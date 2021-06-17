<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Campaign extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    public $fillable = ['name', 'description', 'design', 'started_at', 'ended_at'];

    protected $attributes = [
        'slug' => 'name',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($this->name . '-' . Str::random(8), '-');
    }

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
     * Accessor to decode Campaign design JSON
     */
    public function getDesignAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * A campaign has many wishlists
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
