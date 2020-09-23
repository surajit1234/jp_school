<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContents extends Model
{

    protected $table = 'page_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'content_key', 'content_title','short_desc','long_desc'
    ];

    /*public function page_content_details()
    {
        return $this->hasMany('App\PageContentDetails','page_content_id');
    }*/

}