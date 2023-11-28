<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\AdminFactory;
use Database\Factories\MenuFactory;
use Database\Factories\MenuItemFactory;
use Database\Factories\WebpageFactory;


class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		AdminFactory::new()->createOne([
			'email' => 'moiseevEO@yandex.ru',
			'password' => bcrypt('1234'),
			'name' => 'Евгений',
		]);

		WebpageFactory::new()->count(10)->create();

		MenuFactory::new()->count(2)->create();

		MenuItemFactory::new()->count(20)->create();
	}
}
