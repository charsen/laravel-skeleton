<?php
namespace App\Libs\Repository;

/**
 * Interface Transformable
 * @package Prettus\Repository\Contracts
 */
interface Transformable
{
    /**
     * @return array
     */
    public function transform();
}
