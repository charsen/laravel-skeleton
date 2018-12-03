<?php

namespace App\Http\Controllers\Enterprise;

use App\Repositories\PasswordResetRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\FormWidgetCollection;
use Illuminate\Http\Request;

/**
 * PasswordReset Controller
 *
 * @package App\Http\Controllers\Enterprise;
 * @author  Charsen
 * @date    2018-12-03 23:26:07
 */
class PasswordResetController extends Controller
{

    protected $repository;

    /**
     *
     * @param PasswordResetRepository $repository
     */
    public function __construct(PasswordResetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 列表
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Exception
     */
    public function index(Request $req)
    {
        $this->repository->validator()->with($req)->passesOrFail('index');

        $result = $this->repository->paginate($req->input('page_limit', NULL));

        return BaseResource::collection($result);
    }

    /**
     * 回收站列表
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Exception
     */
    public function trashed(Request $req)
    {
        $this->repository->validator()->with($req)->passesOrFail('trashed');

        $result = $this->repository->getModel()->onlyTrashed()->paginate($req->input('page_limit', NULL));

        return BaseResource::collection($result);
    }

    /**
     * 创建
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function store(Request $req)
    {
        $result = $this->repository->create($req);

        return new BaseResource($result);
    }

    /**
     * 更新
     *
     * @param \Illuminate\Http\Request $req
     * @param                          $id
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function update(Request $req, $id)
    {
        $result = $this->repository->update($req, $id);

        return new BaseResource($result);
    }

    /**
     * 查看
     *
     * @param int $id
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function show($id)
    {
        $result = $this->repository->find($id);

        return new BaseResource($result);
    }

    /**
     * 删除
     *
     * @param int $id
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function destroy($id)
    {
        $result = $this->repository->delete($id);

        return new BaseResource($result);
    }

    /**
     * 批量删除
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function destroyBatch(Request $req)
    {
        $this->repository->validator()->with($req)->passesOrFail('destroyBatch');

        if ($req->input('force', FALSE) !== FALSE)
        {
            $data   = $this->repository->getModel()->onlyTrashed()->whereIn('id', $req->input('ids'))->get();
            $result = $data->map(function($item) {
                if ($item->forceDelete())
                {
                    return $item;
                }
            });
        }
        else
        {
            $result = collect($req->input('ids'))->map(function($id) {
                return $this->repository->delete($id);
            });
        }

        return new BaseResource($result);
    }

    /**
     * 批量恢复软删除的数据
     *
     * @param \Illuminate\Http\Request $req
     *
     * @return \App\Http\Resources\BaseResource
     * @throws \Exception
     */
    public function restoreBatch(Request $req)
    {
        $this->repository->validator()->with($req)->passesOrFail('restoreBatch');

        $data   = $this->repository->getModel()->onlyTrashed()->whereIn('id', $req->input('ids'))->get();
        $result = $data->map(function($item) {
            if ($item->restore())
            {
                return $item;
            }
        });

        return new BaseResource($result);
    }

    /**
     * 返回创建控件信息
     *
     * @return \App\Http\Resources\FormWidgetCollection
     */
    public function create()
    {
        $result = [
            [
                'field_name'    => 'email',
            ],
            [
                'field_name'    => 'token',
            ],
        ];;

        return new FormWidgetCollection(collect($result));
    }

    /**
     * 返回创建控件信息
     *
     * @param $id
     *
     * @return \App\Http\Resources\BaseResource
     */
    public function edit($id)
    {
        $result = $this->repository->find($id);

        return (new BaseResource($result))->additional([
            'meta' => [
                'form_widgets' => $this->create()
            ]
        ]);
    }

}
