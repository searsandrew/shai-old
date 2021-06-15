<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donee extends Model
{
    use HasFactory, SoftDeletes;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
