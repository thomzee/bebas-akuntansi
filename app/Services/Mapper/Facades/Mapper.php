<?php

namespace App\Services\Mapper\Facades;

use App\Services\Mapper\BaseMapper;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * Laravel REST API response mapper.
 *
 * @author     Thomas Andtianto
 * @license    MIT
 * @copyright  (c) 2019, Thomas Andrianto
 */

/**
 * @method list(BaseMapper $mapper, Paginator $paged, int $countAll, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method single(BaseMapper $mapper, Model $single, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method validation(Validator $validator, string $method, $merged = false, int $code = JsonResponse::HTTP_UNPROCESSABLE_ENTITY, array $additional = [])
 * @method success(string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method error($errorMessage, string $method, int $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR, array $additional = [])
 * @method array(array $array, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method object($object, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method arrayObject($object, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 * @method mappedCollection(BaseMapper $mapper, $data, string $method, int $code = JsonResponse::HTTP_OK, array $additional = [])
 *
 */
class Mapper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mapper';
    }
}
