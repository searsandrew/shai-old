<?php

namespace App\Models;

use App\Models\Attachment;
use App\Models\Campaign;
use App\Models\Donee;
use App\Models\Family;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

use Auth;

class Wishlist extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    public $fillable = ['slug', 'wishlist', 'status', 'emailed_at'];

    public $appends = ['family'];

    /**
     * Set the route key name to slug
     * 
     * @return string
     */
    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function getFamilyAttribute()
    {
        return $this->attributes['family'] = $this->donee->family->id;

    }

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
        if($this->status != 'unfilled')
        {
            return false;
        }

        if($this->update(['status' => 'selected']))
        {
            return $this->user()->associate(Auth::user())->save();
        }

        return false;
    }

    /**
     * Make a wishlist selected by a user
     */
    public function removeSelection()
    {
        if($this->update(['status' => 'unfilled']))
        {
            return $this->user()->dissociate()->save();
        }

        return false;
    }

    public function completeWishlist()
    {
        $this->update(['status' => 'completed']);
    }

    public function addLikeBy(User $user)
    {
        dd('fail');
    }

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
