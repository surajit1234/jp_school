<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'status','title','link','image'
    ];

    /*public function banner_details()
    {
        return $this->hasMany('App\BannerDetails','banner_id');
    } */   

}