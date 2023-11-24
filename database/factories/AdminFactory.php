<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
	protected $model = MoonshineUser::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'moonshine_user_role_id' => MoonshineUserRole::DEFAULT_ROLE_ID,
			'name' => fake()->name(),
			'email' => fake()->unique()->safeEmail(),
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
			'remember_token' => Str::random(10),
		];
	}
}
