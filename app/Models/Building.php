<?php

namespace App\Models;
/**
 * @OA\Schema(
 *     schema="Building",
 *     title="Building",
 *     type="object",
 *     required={"name", "latitude", "longitude"},
 *     @OA\Property(property="id", type="integer", example=42),
 *     @OA\Property(property="name", type="string", example="Address street"),
 *     @OA\Property(property="latitude", type="float", example=2.22),
 *     @OA\Property(property="longitude", type="float", example=54.33),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

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
