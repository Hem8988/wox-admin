<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_has_permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id', 'permission_name_slug'
    ];
   
}
