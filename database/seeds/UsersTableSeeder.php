<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// 获取 Faker 实例
		$faker = app(Faker\Generator::class);

		// 生成数据集合
		factory(User::class, 30)->create()->each(function ($user) use ($faker) {
		});
		
		$user               = User::find(1);
		$user->real_name    = 'root';
		$user->mobile       = '13311112222';
		$user->password     = 12345678;
		$user->save();
	}
}
