<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    //
    protected $table = 'email_templates';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'template_key', 
        'template_title',
        'template_content',
        'status'
    ];  

      
}
