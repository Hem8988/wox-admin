<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Model
{
    use HasFactory;
    use Notifiable;
    use Sortable;

    protected $fillable = [
        'categoryId',
        'permissionName',
        'permission_slug'
    ];

    public $sortable = ['id', 'created_at', 'updated_at'];
}
