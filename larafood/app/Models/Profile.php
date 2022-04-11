<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * get permissions
     */
    public function getPermissions()
    {
        return $this->belongsToMany(Permission::class);
    }



}
