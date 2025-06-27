<?php

namespace App\Models;
/**
 * @OA\Schema(
 *     schema="Organization",
 *     title="Organization",
 *     type="object",
 *     required={"name", "building_id"},
 *     @OA\Property(property="id", type="integer", example=42),
 *     @OA\Property(property="name", type="string", example="ООО Пример"),
 *     @OA\Property(property="building_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

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
