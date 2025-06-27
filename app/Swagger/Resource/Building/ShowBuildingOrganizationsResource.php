<?php

namespace App\Swagger\Resource\Building;

/**
 * @OA\Schema(
 *     schema="ShowBuildingOrganizationsResource",
 *     title="ShowBuildingOrganizationsResource",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Адрес"),
 *     @OA\Property(property="latitude", type="float", example=10.40),
 *     @OA\Property(property="longitude", type="float", example=130.10),
 *     @OA\Property(
 *         property="organizations",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/ActivityOrganizationItemOrganization")
 *     )
 * )
 */
class ShowBuildingOrganizationsResource
{

}
