<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'craig@outstandingweb.co.uk',
            'password' => bcrypt('password'),
            'name' => 'Craig Woodland',


        ]);
        $user = User::create([
            'email' => 'jamie@outstandingweb.co.uk',
            'password' => bcrypt('password'),
            'name' => 'Jamie Arnold',

        ]);

        $user = User::create([
            'email' => 'harrison@outstandingweb.co.uk',
            'password' => bcrypt('password'),
            'name' => 'Harrison Stevens',

        ]);

        $event = Event::create([
            'name' => 'Changing World',
            'description' => 'The event is for changing how we view the top of the world',
            'img_path' => 'Event/',
            'start_date' => "2018-12-28 19:18:44",
            'end_date' => "2018-12-29 19:18:44"

        ]);

        $event = Event::create([
            'name' => 'Changing Women',
            'description' => 'The event is for changing how we view the women of the world',
            'img_path' => 'Event/',
            'start_date' => "2018-12-26 19:18:44",
            'end_date' => "2018-12-27 19:18:44"

        ]);

        $event = Event::create([
            'name' => 'Changing Men',
            'description' => 'The event is for changing how we view the men of the world',
            'img_path' => 'Event/',
            'start_date' => "2018-11-8 19:18:44",
            'end_date' => "2018-12-9 19:18:44"

        ]);
    }
}
