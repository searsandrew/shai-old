<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Family extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    public $fillable = ['name'];

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
     * A family has many donees
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donees() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Donee::class);
    }
}
