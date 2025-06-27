<?php
namespace App\Swagger\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *  name="Organization",
 *  description="Методы для работы с организациями"
 * )
 */
class OrganizationController {

    /**
     * @OA\Get(
     *     path="/api/organization",
     *     summary="Получить список организаций",
     *     tags={"Organization"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *         @OA\JsonContent(type="object",
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/ActivityOrganizationItemOrganization")
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
     *     path="/api/organization",
     *     summary="Создать организацию",
     *     tags={"Organization"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "phone", "building_id", "activities"},
     *             @OA\Property(property="name", type="string", example="New Building"),
     *             @OA\Property(
     *                 property="phone",
     *                 type="array",
     *                 @OA\Items(type="string", example="88005553535")
     *             ),
     *             @OA\Property(property="building_id", type="integer", example=8),
     *             @OA\Property(
     *                 property="activities",
     *                 type="array",
     *                 @OA\Items(type="integer", example=2)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(type="object",
     *           @OA\Property(
     *               property="data",
     *               type="object",
     *               ref="#/components/schemas/ActivityOrganizationItemOrganization"
     *           )
     *         )
     *     )
     * )
     */
    public function store($request)
    {
        return [];
    }

    /**
     * @OA\Get(
     *     path="/api/organization/{organization}",
     *     summary="Получить одну организацию",
     *     tags={"Organization"},
     *     @OA\Parameter(
     *         name="organization",
     *         in="path",
     *         required=true,
     *         description="ID дятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Данные по организации",
     *          @OA\JsonContent(type="object",
     *            @OA\Property(
     *                property="data",
     *                type="object",
     *                ref="#/components/schemas/ActivityOrganizationItemOrganization"
     *            )
     *          )
     *      ),
     *     @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function show($activity)
    {
        return [];
    }

    /**
     * @OA\Put(
     *     path="/api/organization/{organization}",
     *     summary="Обновить организацию",
     *     tags={"Organization"},
     *     @OA\Parameter(
     *         name="organization",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              required={"name", "phone", "building_id", "activities"},
     *              @OA\Property(property="name", type="string", example="New Building"),
     *              @OA\Property(
     *                  property="phone",
     *                  type="array",
     *                  @OA\Items(type="string", example="88005553535")
     *              ),
     *              @OA\Property(property="building_id", type="integer", example=8),
     *              @OA\Property(
     *                  property="activities",
     *                  type="array",
     *                  @OA\Items(type="integer", example=2)
     *              )
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Обновлено",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/ActivityOrganizationItemOrganization"
     *             )
     *           )
     *     )
     * )
     */
    public function update($request, $activity)
    {
        return [];
    }

    /**
     * @OA\Delete(
     *     path="/api/organization/{organization}",
     *     summary="Удалить организацию",
     *     tags={"Organization"},
     *     @OA\Parameter(
     *         name="organization",
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
     *     path="/api/organization/search",
     *     summary="Поиск организаций по имени",
     *     tags={"Organization"},
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=false,
     *          description="Название здания для поиска",
     *          @OA\Schema(type="string", example="Башня Федерация")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *         @OA\JsonContent(type="object",
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/ActivityOrganizationItemOrganization")
     *          )
     *        )
     *     )
     * )
     */
    public function search($activity)
    {
        return [];
    }
}
