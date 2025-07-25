<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="Swagger код дипломной работы",
 *      @OA\Contact(
 *          email="DRNikitin@stud.kpfu.ru"
 *      ),
 * ),
 * @OA\PathItem(
 *     path="/api/documentation",
 * ),
 * @OA\Components(
 *      @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          type="http",
 *          scheme="bearer"
 *      )
 *  )
 *  )
 *
 */

abstract class Controller
{
    //
}
