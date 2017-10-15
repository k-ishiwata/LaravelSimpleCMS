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

//    public function types() {
//        return [
//            'product' => '商品について',
//            'service' => 'サービスについて',
//            'etc' => 'その他'
//        ];
//    }
}
