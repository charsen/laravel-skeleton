<?php
namespace App\Libs\Repository;

/**
 * Interface CriteriaInterface
 * @package Prettus\Repository\Contracts
 */
interface CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, $repository);
}
