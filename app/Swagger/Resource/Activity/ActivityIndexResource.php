<?php

namespace App\Swagger\Resource\Activity;
/**
 * @OA\Schema(
 *     schema="ActivityIndexResource",
 *     title="ActivityIndexResource",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Маркетинг"),
 *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null),
 *     @OA\Property(
 *          property="parent",
 *          type="object",
 *          ref="#/components/schemas/ActivityIndexResourceItem"
 *      )
 * )
 */
class ActivityIndexResource
{

}
