<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ListingFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->jobTitle();
        $paragraphs = fake()->paragraphs(3);
        $content = '';
        foreach ($paragraphs as $line) {
            $content .= '<p class="mt-4">' . $line . '</p>';
        }

        // Generate a random hex color code
        $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

        // Initialize the ImageManager with GD driver
        $manager = new ImageManager(new Driver());

        // Create a unique filename for the logo
        $logoPath = 'company_logos/' . uniqid() . '.png';

        // Ensure the directory exists
        Storage::disk('public')->makeDirectory('company_logos');

        // Create the image using the manager with the random background color
        $image = $manager->create(200, 200)->fill($randomColor);

        // Add text to the image
        $image->text('LOGO', 100, 100, function ($font) {
            $font->size(24);
            $font->color('000');
            $font->align('center');
            $font->valign('middle');
        });

        // Save the image as PNG
        Storage::disk('public')->put($logoPath, $image->toPng());

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'logo' => $logoPath,
            'is_highlighted' => fake()->boolean(70),
            'is_active' => true,
            'content' => $content,
            'apply_link' => fake()->url(),
        ];
    }
}
