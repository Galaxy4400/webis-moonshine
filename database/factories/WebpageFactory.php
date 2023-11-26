<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class WebpageFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$title = $this->faker->words(asText: true);

		return [
			'title' => $title,
			'slug' => str($title)->slug(),
			'body' => $this->faker->text(),
		];
	}
}
