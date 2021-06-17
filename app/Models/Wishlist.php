<?php

namespace App\Models;

use App\Models\Donee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Wishlist extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    public $fillable = ['wishlist', 'status'];

    /**
     * A wishlish belongs to a donee
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function donee() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Donee::class);
    }
}
