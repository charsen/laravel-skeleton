# laravel-skeleton

## 1. 关于
内部学习 laravel 的程序骨架。
_PS：随时可能调整自定义的类库及代码结构。_


## 2. 集成 packages
- [l5-repository (但做了一些修改)](https://github.com/andersao/l5-repository)
- [jwt-auth](https://github.com/tymondesigns/jwt-auth)
- [laravel-scaffold](https://github.com/charsen/laravel-scaffold)


## 3. 初始化

### 3.1 Generate JWT secret key
```sh
php artisan jwt:secret
```

### 3.2 修改 .env 配置，执行数据迁移

### 3.3 设置 scaffold 开发者信息
```sh
php artisan scaffold:init `author`
```

### 3.4 发布 scaffold 前端公共资源包到 public 目录下：
```sh
php artisan vendor:publish --provider=Charsen\\Scaffold\\ScaffoldProvider --tag=public --force
```

## 4. 使用

### 4.1 相关网址
- Scaffold DB: {{your_url}}/scaffold/db
- Scaffold Api: {{your_url}}/scaffold/api
- Scaffold Api Test: {{your_url}}/scaffold/request

### 4.2 Scaffold 文档
- [README](https://github.com/charsen/laravel-scaffold/blob/master/README.md)

