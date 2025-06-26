<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'building_id'];
    protected $hidden = ['created_at', 'updated_at', 'pivot', 'building_id'];
    protected $casts = ['phone' => 'array'];
    protected $with = ['building', 'activities'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'organization_activity');
    }

    public function building() {
        return $this->belongsTo(Building::class);
    }
}
