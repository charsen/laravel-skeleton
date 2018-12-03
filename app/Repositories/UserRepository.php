<?php

namespace App\Repositories;

use App\Entities\User;
use App\Libs\Repository\AbstractRepository;
use Illuminate\Validation\Rule;
use App\Libs\Repository\RequestCriteria;

/**
 * Class UserRepository.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        
        'create' => [
            'name'           => 'required|unique:users',
            'mobile'         => 'required|unique:users',
            'password'       => 'required',
        ],
        'update' => [
            'name'           => 'sometimes|required|unique:users',
            'mobile'         => 'sometimes|required|unique:users',
            'password'       => 'sometimes|required',
        ],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
