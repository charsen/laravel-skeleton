# laravel-skeleton

## 关于
内部学习 laravel 的程序骨架。
_PS：随时可能调整自定义的类库及代码结构。_

## 集成 packages
- [l5-repository (但做了一些修改)](https://github.com/andersao/l5-repository)
- [jwt-auth](https://github.com/tymondesigns/jwt-auth)
- [laravel-scaffold](https://github.com/charsen/laravel-scaffold)

## 初始化

### 3.1 Generate JWT secret key
```bash
php artisan jwt:secret
```

### 3.2 发布 scaffold 公共资源包
```bash
php artisan vendor:publish --provider=Charsen\\Scaffold\\ScaffoldProvider --tag=public --force
```

