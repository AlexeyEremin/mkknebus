<?php

namespace App\Http\Controllers;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API MKK Nebus",
 *     version="1.0.0",
 *     description="Документация к API",
 *     @OA\Contact(
 *         email="dogvor@yandex.ru"
 *     )
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\OpenApi(
 *      security={{"bearerAuth":{}}}
 *  )
 */

abstract class Controller
{
    //
}
