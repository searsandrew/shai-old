<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
