<?php
return array (
  'table_name' => 'password_resets',
  'model_class' => 'PasswordReset',
  'repository_class' => 'PasswordReset',
  'name' => '重置密码',
  'desc' => '存储用户重置密码信息',
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
  ),
  'fields' => 
  array (
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
    'token' => 
    array (
      'name' => 'Token',
      'type' => 'varchar',
      'size' => 100,
      'require' => true,
      'desc' => '',
      'default' => '',
      'allow_null' => false,
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
  ),
  'dictionaries' => 
  array (
  ),
);
