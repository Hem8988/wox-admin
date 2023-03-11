<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoriname'
       ];
      
     public $sortable = ['id', 'created_at', 'updated_at'];
    
}
