<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    //

    protected $table ='site_information';

    protected $fillable =[
        'title',
        'content',
        'status',
        'type'
    ];
}
