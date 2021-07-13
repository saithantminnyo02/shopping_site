<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot(['remark']);
    }
}
