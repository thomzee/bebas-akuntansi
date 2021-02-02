<?php


namespace App\Services\Mapper;


/**
 * Interface MapperContract
 * @package App\Services\Mapper
 */
interface MapperContract
{
    /**
     * @param $item
     * @return mixed
     */
    public function single($item);

    /**
     * @param $items
     * @return mixed
     */
    public function list($items);
}
