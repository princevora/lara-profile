<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    private $badges = [
        "Peace"          => "262e",
        "Coder"          => "1f4bb",
        "Artist"         => "1f3a8",
        "Designer"       => "1f3a8",
        "Writer"         => "1f4dd",
        "Entrepreneur"   => "1f4bc",
        "Investor"       => "1f4b0",
        "Musician"       => "1f3b8",
        "Photographer"   => "1f4f7",
        "Outdoors"       => "1f3d5",
        "Drinker"        => "1f37b",
        "Foodie"         => "1f37f",
        "Movies"         => "1f5fd",
        "TV Series"      => "1f4fa",
        "♫Music"         => "1f3b5",
        "Smoker"         => "1f52b",
        "6 Lifter"       => "1f4aa",
        "In The Clouds"  => "2604",
        "Out In Space"   => "1f680",
        "Reader"         => "1f4da",
        "Business"       => "1f4bc",
        "Athletic"       => "1f3c3",
        "Science"        => "1f52c",
        "Pretty Spicy"   => "1f48a",
        "Lowkey"         => "1f647",
        "Animals"        => "1f98a",
        "Adorable"       => "1f970",
        "Producer"       => "1f4bc",
        "Travel"         => "1f4bb",
        "Gamer"          => "1f3ae",
        "Dizzy"          => "1f634",
        "Angel"          => "1f607",
        "Danger"         => "26a0",
        "Skater"         => "1f6f9",
        "Flirty"         => "1f609",
        "Baller"         => "1f3c0",
        "Makeup"         => "1f482",
        "Golf"           => "1f3c2",
        "Racing"         => "1f3c1",
        "Frozen"         => "2744",
        "Psychic"        => "1f52e"
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->badges as $name => $code) {
            Badge::create([
                "name" => $name,
                "code" => $code,
            ])->save();
        }
    }
}
