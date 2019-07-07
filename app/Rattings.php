<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rattings extends Model
{
    protected $fillable = [
        'ratting', 'comment', 'name','email','product_id'
    ];


    public function product() {
		return $this->belongsTo(Product::class);

    }
}
