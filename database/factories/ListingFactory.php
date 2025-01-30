<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->jobTitle();
        $paragraph = fake()->paragraphs(3);
        $content = '';

        foreach ($paragraph as $line) {
            $content .= '<p class="mt-4">' . $line . '</p>';
        }

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'logo' => basename(fake()->image(storage_path('app/public'))),
            'is_highlighted' => fake()->boolean(70),
            'is_active' => true,
            'content' => $content,
            'apply_link' => fake()->url(),
        ];
    }
}
