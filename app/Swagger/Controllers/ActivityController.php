<?php
namespace App\Swagger\Controllers;

/**
 * @OA\Tag(
 *  name="Activities",
 *  description="Методы для работы с дятельностями"
 * )
 */
class ActivityController {

    /**
     * @OA\Get(
     *     path="/api/activity",
     *     summary="Получить список деятельностей",
     *     tags={"Activities"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ActivityIndexResource")
     *              )
     *          )
     *     )
     * )
     */
    public function index()
    {
        return [];
    }

    /**
     * @OA\Post(
     *     path="/api/activity",
     *     summary="Создать дятельность",
     *     tags={"Activities"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(
     *              type="object",
     *                  @OA\Property(
     *                   property="data",
     *                   type="object",
     *                   ref="#/components/schemas/ActivityIndexResourceItem"
     *               )
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
     *     path="/api/activity/{activity}",
     *     summary="Получить одну деятельность",
     *     tags={"Activities"},
     *     @OA\Parameter(
     *         name="activity",
     *         in="path",
     *         required=true,
     *         description="ID дятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ActivityIndexResource"
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
     *     path="/api/activity/{activity}",
     *     summary="Обновить деятельность",
     *     tags={"Activities"},
     *     @OA\Parameter(
     *         name="activity",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Обновлено",
     *         @OA\JsonContent(
     *              type="object",
     *                  @OA\Property(
     *                   property="data",
     *                   type="object",
     *                   ref="#/components/schemas/ActivityIndexResource"
     *               )
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
     *     path="/api/activity/{activity}",
     *     summary="Удалить деятельность",
     *     tags={"Activities"},
     *     @OA\Parameter(
     *         name="activity",
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
     *     path="/api/activity/{activity}/organizations",
     *     summary="Получить организации деятельности",
     *     tags={"Activities"},
     *     @OA\Parameter(
     *         name="activity",
     *         in="path",
     *         required=true,
     *         description="ID дятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешно",
     *         @OA\JsonContent(
     *               type="object",
     *               @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ActivityOrganization"
     *               )
     *         )
     *     ),
     *     @OA\Response(response=404, description="Не найдено")
     * )
     */
    public function organizations($activity)
    {
        return [];
    }

    /**
     * @OA\Get(
     *     path="/api/activity/{activity}/search",
     *     summary="Поиск по дятельности всех организаций и подчиенных организаций по дятельности",
     *     tags={"Activities"},
     *     @OA\Parameter(
     *          name="activity",
     *          in="path",
     *          required=true,
     *          description="ID дятельности",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Успешно",
     *          @OA\JsonContent(
     *                type="object",
     *                @OA\Property(
     *                   property="data",
     *                   type="object",
     *                   ref="#/components/schemas/ActivityOrganization"
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
