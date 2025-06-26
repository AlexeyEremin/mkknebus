<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;

    const TYPE_RADIUS_SEARCH = 'radius';
    const TYPE_RECTANGLE_SEARCH = 'rectangle';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
