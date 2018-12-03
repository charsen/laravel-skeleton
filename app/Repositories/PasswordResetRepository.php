<?php

namespace App\Repositories;

use App\Entities\PasswordReset;
use App\Libs\Repository\AbstractRepository;
use App\Libs\Repository\RequestCriteria;

/**
 * PasswordReset Repository
 *
 * @package App\Repositories;
 * @author  Charsen
 * @date    2018-12-03 23:23:12
 */
class PasswordResetRepository extends AbstractRepository implements PasswordResetRepositoryInterface
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        'index' => [
            'page' => 'sometimes|required|integer|min:1',
            'page_limit' => 'sometimes|required|integer|min:1',
        ],
        'trashed' => [
            'page' => 'sometimes|required|integer|min:1',
        ],
        'create' => [
            'email' => 'required|max:128',
            'token' => 'required|max:100',
        ],
        'update' => [
            'email' => 'sometimes|required|max:128',
            'token' => 'sometimes|required|max:100',
        ],
        'destroyBatch' => [
            'ids' => 'required|array',
            'force' => 'sometimes|required|boolean',
        ],
        'restoreBatch' => [
            'ids' => 'required|array',
        ],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PasswordReset::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
