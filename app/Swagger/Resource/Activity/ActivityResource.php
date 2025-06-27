<?php
namespace App\Swagger\Resource\Activity;
/**
 * @OA\Schema(
 *     schema="ActivityActivityResource",
 *     title="ActivityActivityResource",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Маркетинг"),
 *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null),
 *     @OA\Property(
 *          property="organizations",
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Organization")
 *      )
 * )
 */
class ActivityResource
{

}
