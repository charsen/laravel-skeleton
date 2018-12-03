<?php
return array (
  'table_name' => 'users',
  'model_class' => 'User',
  'repository_class' => 'User',
  'name' => '用户',
  'desc' => '存储用户信息',
  'remark' => 
  array (
    0 => '',
  ),
  'index' => 
  array (
    'id' => 
    array (
      'type' => 'primary',
      'fields' => 'id',
      'method' => 'btree',
    ),
    'name' => 
    array (
      'type' => 'unique',
      'fields' => 'name',
      'method' => 'btree',
    ),
    'email' => 
    array (
      'type' => 'unique',
      'fields' => 'email',
      'method' => 'btree',
    ),
  ),
  'fields' => 
  array (
    'id' => 
    array (
      'name' => '编号',
      'type' => 'int',
      'require' => true,
      'desc' => '',
      'default' => 0,
      'allow_null' => false,
      'size' => 10,
      'unsigned' => true,
    ),
    'name' => 
    array (
      'name' => '用户名',
      'type' => 'varchar',
      'require' => true,
      'desc' => '',
      'default' => '',
      'allow_null' => false,
      'size' => 32,
    ),
    'mobile' => 
    array (
      'require' => false,
      'name' => '手机号码',
      'type' => 'varchar',
      'desc' => '',
      'default' => '',
      'allow_null' => true,
      'size' => 32,
    ),
    'email' => 
    array (
      'name' => '邮箱',
      'type' => 'varchar',
      'size' => 128,
      'require' => true,
      'desc' => '',
      'default' => '',
      'allow_null' => false,
    ),
    'email_verified_at' => 
    array (
      'name' => '邮箱验证于',
      'type' => 'timestamp',
      'require' => true,
      'desc' => '',
      'default' => NULL,
      'allow_null' => false,
    ),
    'password' => 
    array (
      'name' => '密码',
      'type' => 'varchar',
      'size' => 128,
      'require' => true,
      'desc' => '',
      'default' => '',
      'allow_null' => false,
    ),
    'remember_token' => 
    array (
      'name' => '记住Token',
      'type' => 'varchar',
      'size' => 100,
      'require' => true,
      'desc' => '',
      'default' => '',
      'allow_null' => false,
    ),
    'deleted_at' => 
    array (
      'require' => false,
      'name' => '删除于',
      'type' => 'timestamp',
      'default' => 'null',
      'desc' => '',
      'allow_null' => true,
    ),
    'created_at' => 
    array (
      'name' => '创建于',
      'type' => 'timestamp',
      'require' => true,
      'desc' => '',
      'default' => NULL,
      'allow_null' => false,
    ),
    'updated_at' => 
    array (
      'name' => '更新于',
      'type' => 'timestamp',
      'require' => true,
      'desc' => '',
      'default' => NULL,
      'allow_null' => false,
    ),
  ),
  'dictionaries' => 
  array (
  ),
);
