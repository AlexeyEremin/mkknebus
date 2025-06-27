<?php
namespace App\Swagger\Requests\Building;
/**
 * @OA\Schema(
 *     schema="BuildingUpdateRequest",
 *     title="BuildingUpdateRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Маркетинг"),
 *     @OA\Property(property="latitude", type="float", example=10.01),
 *     @OA\Property(property="longitude", type="float", example=10.01)
 * )
 */
class UpdateRequest {

}
