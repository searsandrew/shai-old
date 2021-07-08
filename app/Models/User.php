<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the Wishlist's chosen by the user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function wishlistsByCampaign($campaign)
    {
        return $this->hasMany(Wishlist::class)->where('campaign_id', $campaign)->get();
    }

    public function familyWishlistsByCampaign($campaign)
    {
        $wishlists = [];
        $familyWishlists = $this->hasMany(Wishlist::class)->where('campaign_id', $campaign)->get();
        foreach($this->wishlists as $wishlist)
        {
            $wishlists[$wishlist->donee->family->id][] = $wishlist;
        }

        return $wishlists;
    }
}
