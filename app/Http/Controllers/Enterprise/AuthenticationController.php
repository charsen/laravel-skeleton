<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticationController extends Controller
{
    /**
     * @var mixed
     */
    protected $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function authenticate(Request $req)
    {
        $credentials = $req->only('mobile', 'password');

        try 
        {
            if (! $token = JWTAuth::attempt($credentials)) 
            {
                return response()->json(['message' => '手机号或密码错误.'], 401);
            }
        } 
        catch (JWTException $e) 
        {
            return response()->json(['message' => '无法创建Token'], 500);
        }

        $result = $this->repository->with('positions')->find(JWTAuth::user()->id);

        // all good so return the token
        return response()->json([
            'data' => [
                'user'  => JWTAuth::user(),
                'token' => $token
            ]
        ]);
    }
}
