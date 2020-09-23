<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
	protected $guarded = [];
    protected $table = 'site_settings';

    public $timestamps = false;

}