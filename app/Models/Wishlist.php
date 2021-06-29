<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\Donee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

use Auth;

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

    /**
     * A wishlist belongs to a campaign
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
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

    /**
     * Make a wishlist selected by a user
     */
    public function addSelection()
    {
        return $this->user()->associate(Auth::user());
    }

    public function addLikeBy(User $user)
    {
        dd('fail');
    }
}
