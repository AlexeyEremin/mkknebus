<?php

namespace App\Models;
/**
 * @OA\Schema(
 *     schema="ActivityOrganizationPivot",
 *     type="object",
 *     title="Pivot: Activity ↔ Organization",
 *     @OA\Property(property="organization_id", type="integer", example=2),
 *     @OA\Property(property="activity_id", type="integer", example=1),
 * )
 */

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationActivity extends Pivot
{
    //
}
