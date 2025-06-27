<?php

namespace App\Swagger\Resource\Activity;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ActivityOrganizationItemOrganization",
 *     title="ActivityOrganizationItemOrganization",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="ООО Маркетинг"),
 *     @OA\Property(
 *      property="phone",
 *      type="array",
 *      @OA\Items(type="string", example="+7 999 123 45 67")
 *     ),
 *      @OA\Property(
 *            property="building",
 *            type="object",
 *            ref="#/components/schemas/ActivityOrganizationItemBuilding"
 *       ),
 *      @OA\Property(
 *            property="activities",
 *            type="array",
 *            @OA\Items(ref="#/components/schemas/ActivityIndexResource")
 *       )
 * )
 */
class ActivityOrganizationItemOrganization
{

}
