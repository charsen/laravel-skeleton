<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


/**
 * PasswordReset Model
 *
 * @package App\Entities;
 * @author  Charsen
 * @date    2018-12-03 23:23:12
 */
class PasswordReset extends Model
{
    

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'password_resets';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'token'];

    /**
     * 应被转换为日期的属性
     *
     * @var array
     */
    protected $dates = ['created_at'];



}
