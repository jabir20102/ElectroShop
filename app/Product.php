<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'title', 'description', 'details','price','user','colors','category','brand','discount'
    ];

     public function images()

    {
		return $this->hasMany(Images::class);

    }
     public function rattings()    {
        return $this->hasMany(Rattings::class);

    }
     public function user()

    {
return $this->belongsTo(User::class);

    }
    public function offer()
    {
        return $this->hasOne('App\Offer');
    }
    public function wishlist()
    {
        return $this->hasOne('App\Wishlist');
    }

}
