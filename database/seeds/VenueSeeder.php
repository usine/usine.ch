<?php

use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->insert([
            'name' => 'La Makhno',
            'slug' => 'la-makhno',
            'mail' => 'makhno@darksite.ch',
        ]);

        DB::table('venues')->insert([
            'name' => 'Le Zoo',
            'slug' => 'le-zoo',
            'tel' => '+41 22 321 67 49',
            'mail' => 'info@lezoo.ch',
            'website' => 'https://lezoo.ch/',
        ]);

        DB::table('venues')->insert([
            'name' => 'Le Rez',
            'slug' => 'le-rez',
        ]);

        DB::table('venues')->insert([
            'name' => 'Théatre de L\'Usine',
            'slug' => 'theatre-de-l-usine',
        ]);

        DB::table('venues')->insert([
            'name' => 'Cinéma Spoutnik',
            'slug' => 'cinema-spoutnik',
        ]);

        DB::table('venues')->insert([
            'name' => 'Forde',
            'slug' => 'forde',
        ]);

        DB::table('venues')->insert([
            'name' => 'Crache-papier',
            'slug' => 'crache-papier',
        ]);

        DB::table('venues')->insert([
            'name' => 'Radio-Usine',
            'slug' => 'radio-Usine',
        ]);

        DB::table('venues')->insert([
            'name' => 'L\'atelier',
            'slug' => 'l-atelier',
        ]);

        DB::table('venues')->insert([
            'name' => 'Azzurro Matto',
            'slug' => 'azzurro-matto',
        ]);

        DB::table('venues')->insert([
            'name' => 'archiCouture',
            'slug' => 'archicouture',
        ]);

        DB::table('venues')->insert([
            'name' => 'Urgence Disk',
            'slug' => 'urgence-disk',
        ]);

        DB::table('venues')->insert([
            'name' => 'Studio des Forces Motrices',
            'slug' => 'studio-des-forces-motrices',
        ]);

        DB::table('venues')->insert([
            'name' => 'Studio Coffre-fort',
            'slug' => 'studio-coffre-fort',
        ]);

        DB::table('venues')->insert([
            'name' => 'Le cheveu sur la soupe',
            'slug' => 'le-cheveu-sur-la-soupe',
        ]);

        DB::table('venues')->insert([
            'name' => 'Reklam & Ladiff',
            'slug' => 'reklam-ladiff',
        ]);
    }
}
