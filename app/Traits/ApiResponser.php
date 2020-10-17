<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 6:02 PM
 */

namespace App\Traits;


use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build a success response
     * @param string|array $data
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build an error response
     * @param string|array $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build an error response
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
