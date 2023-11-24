<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\AdminFactory;
use Database\Factories\PageFactory;

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

		PageFactory::new()->count(10)->create();
	}
}
