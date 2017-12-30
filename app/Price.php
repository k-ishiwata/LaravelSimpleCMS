<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'price'
    ];
}
