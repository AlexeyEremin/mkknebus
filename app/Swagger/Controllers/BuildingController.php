<?php
namespace App\Swagger\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *  name="Building",
 *  description="Методы для работы с зданиями"
 * )
 */
class BuildingController {

    /**
     * @OA\Get(
     *     path="/api/building",
     *     summary="Получить список зданий",
     *     tags={"Building"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *         @OA\JsonContent(type="object",
     *          @OA\Property(
     *          property="data",
     *          type="array",
     *          @OA\Items(ref="#/components/schemas/ShowBuildingResource")
     *          )
     *        )
     *     )
     * )
     */
    public function index()
    {
        return [];
    }

    /**
     * @OA\Post(
     *     path="/api/building",
     *     summary="Создать здание",
     *     tags={"Building"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BuildingStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ShowBuildingResource"
     *              )
     *          )
     *     )
     * )
     */
    public function store($request)
    {
        return [];
    }

    /**
     * @OA\Get(
     *     path="/api/building/{building}",
     *     summary="Получить одно здание",
     *     tags={"Building"},
     *     @OA\Parameter(
     *         name="building",
     *         in="path",
     *         required=true,
     *         description="ID дятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ShowBuildingResource"
     *              )
     *          )
     *     ),
     *     @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function show($activity)
    {
        return [];
    }

    /**
     * @OA\Put(
     *     path="/api/building/{building}",
     *     summary="Обновить здание",
     *     tags={"Building"},
     *     @OA\Parameter(
     *         name="building",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BuildingUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ShowBuildingResource"
     *              )
     *          )
     *     )
     * )
     */
    public function update($request, $activity)
    {
        return [];
    }

    /**
     * @OA\Delete(
     *     path="/api/building/{building}",
     *     summary="Удалить здание",
     *     tags={"Building"},
     *     @OA\Parameter(
     *         name="building",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Удалено"),
     *     @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function destroy($activity)
    {
        return [];
    }

    /**
     * @OA\Get(
     *     path="/api/building/{building}/organizations",
     *     summary="Получить организации в здании",
     *     tags={"Building"},
     *     @OA\Parameter(
     *         name="building",
     *         in="path",
     *         required=true,
     *         description="ID здания",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ShowBuildingOrganizationsResource"
     *              )
     *          )
     *     ),
     *     @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function organizations($activity)
    {
        return [];
    }

    /**
     * @OA\POST(
     *     path="/api/building/search",
     *     summary="Поиск организаций в радиусе или в прямоугольнике",
     *     tags={"Building"},
 *          @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              required={"latitude", "longitude", "type"},
     *              @OA\Property(property="latitude", type="number", format="float", example=1.9),
     *              @OA\Property(property="longitude", type="number", format="float", example=1.0),
     *              @OA\Property(property="type", type="string", example="rectangle|radius"),
     *              @OA\Property(property="radius", type="number", format="float", example=100.0),
     *              @OA\Property(property="radiusX", type="number", format="float", example=100.0),
     *              @OA\Property(property="radiusY", type="number", format="float", example=100.0)
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Успешно",
     *          @OA\JsonContent(
     *                type="object",
     *                @OA\Property(
     *                   property="data",
     *                   type="array",
     *                   @OA\Items(ref="#/components/schemas/ActivityOrganizationItemOrganization")
     *                )
     *          )
     *      ),
     *      @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function search($activity)
    {
        return [];
    }
}
