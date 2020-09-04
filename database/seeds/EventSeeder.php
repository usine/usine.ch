<?php

use Illuminate\Database\Seeder;

use App\Venue;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venues = Venue::all()->pluck('id')->toArray();

        factory(App\Event::class, 2000)->create()->each(function ($event) use ($venues) {
            $keys = array_rand($venues, random_int(1, 3));

            if (is_array($keys)) {
                foreach ($keys as $key) {
                    $event->venues()->attach($venues[$key]);
                }
            } else {
                $event->venues()->attach($venues[$keys]);
            }
        });
    }
}
