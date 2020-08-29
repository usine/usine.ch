<?php

use Illuminate\Database\Seeder;

class BlaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bla::class, 50)->create();
    }
}
