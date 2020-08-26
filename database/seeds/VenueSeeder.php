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
            'mail' => 'makhno@darksite.ch',
        ]);

        DB::table('venues')->insert([
            'name' => 'Le Zoo',
            'tel' => '+41 22 321 67 49',
            'mail' => 'info@lezoo.ch',
            'website' => 'https://lezoo.ch/',
        ]);

        DB::table('venues')->insert([
            'name' => 'Le Rez',
        ]);

        DB::table('venues')->insert([
            'name' => 'Théatre de L\'Usine',
        ]);

        DB::table('venues')->insert([
            'name' => 'Spoutnik',
        ]);

        DB::table('venues')->insert([
            'name' => 'Forde',
        ]);

        DB::table('venues')->insert([
            'name' => 'Crache-papier',
        ]);

        DB::table('venues')->insert([
            'name' => 'Radio-Usine',
        ]);

        DB::table('venues')->insert([
            'name' => 'L\'atelier',
        ]);

        DB::table('venues')->insert([
            'name' => 'Azzurro Matto',
        ]);

        DB::table('venues')->insert([
            'name' => 'archiCouture',
        ]);
    }
}
