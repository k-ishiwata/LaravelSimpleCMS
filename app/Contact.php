<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'gender',
        'body'
    ];

    static $types = [
        '商品について',
        'サービスについて',
        'その他'
    ];

    static $genders = [
        '男', '女'
    ];
}
