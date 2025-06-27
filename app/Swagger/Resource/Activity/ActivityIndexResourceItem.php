<?php

namespace App\Swagger\Resource\Activity;

/**
 * @OA\Schema(
 *     schema="ActivityIndexResourceItem",
 *     title="ActivityIndexResourceItem",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Маркетинг"),
 *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null)
 * )
 */
class ActivityIndexResourceItem
{

}
