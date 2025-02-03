<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::get()->each(function ($user) {
            Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function ($listing) {
                $listing->tags()->attach(Tag::get()->random(3));
            });
        });
    }
}
