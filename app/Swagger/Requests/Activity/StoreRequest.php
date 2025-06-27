<?php
namespace App\Swagger\Requests\Activity;
/**
 * @OA\Schema(
 *     schema="ActivityStoreRequest",
 *     title="ActivityStoreRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Маркетинг"),
 *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null)
 * )
 */
class StoreRequest {

}
