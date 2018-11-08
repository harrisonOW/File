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
//        $user = User::create([
//            'email' => 'craig@outstandingweb.co.uk',
//            'password' => bcrypt('password'),
//            'name' => 'Craig Woodland',
//
//
//        ]);
//        $user = User::create([
//            'email' => 'jamie@outstandingweb.co.uk',
//            'password' => bcrypt('password'),
//            'name' => 'Jamie Arnold',
//
//        ]);
//
//        $user = User::create([
//            'email' => 'harrison@outstandingweb.co.uk',
//            'password' => bcrypt('password'),
//            'name' => 'Harrison Stevens',
//
//        ]);

//        Add Events + Extra + booking

        $event1 = Event::create([
            'name' => 'New Year’s Day',
            'description' => 'The event is for changing how we view the top of the world',
            'price' => 0.00,
            'external_link' => null,
            "capacity" =>10000,
            "booking_per_person" =>1,
            "img_path" => "",
            "event_address" => "National",
            "long" =>-0.119543,
            "lat" =>51.503323,
            'start_date' => "2018-12-31 23:58:44",
            'end_date' => "2019-01-01 00:01:44",
            'cancelled_at' => null,

        ]);

        $event1->BookableExtras()->create([
            "name" => "Champagne",
            "description" => "Bubbly Drink",
            "external_path" => "Monte",
            "optional" => "Yes",
            "price" => 2.00,
            "extras_per_person" => 1,
            "amount_available" => 100,
            "cancelled_at" => "2020-01-01 00:01:44",
            ]);

        $event2 = Event::create([
            'name' => 'Good Friday',
            'description' => 'The event is for changing how we view the top of the world',
            'price' => 0.00,
            'external_link' => null,
            "capacity" => 10000,
            "booking_per_person" => 1,
            "img_path" =>  "",
            "event_address" =>"National",
            "long" =>-0.141890,
            "lat" =>51.501366,
            'start_date' => "2018-04-13 23:58:44",
            'end_date' => "2019-04-14 23:01:44",
            'cancelled_at' => null,

        ]);
        $event2->BookableExtras()->create([
            "name" => "Pancake Mix",
            "description" => "Ready for the week ahead, ready n mix",
            "external_path" => "Tesco Store",
            "optional" => "No",
            "price" => 1.50,
            "extras_per_person" => 2,
            "amount_available" => 120,
            "cancelled_at" => "2020-01-01 00:01:44",
        ]);

        $event3 = Event::create([
            'name' => 'Chelsea Win the league',
            'description' => 'The event is for changing how we view the top of the world',
            'price' => 0.00,
            'external_link' => null,
            "capacity" =>10000,
            "booking_per_person" => 1,
            "img_path" => "",
            "event_address" =>"National",
            "long" => -0.913730,
            "lat" => 53.991150,
            'start_date' => "2018-12-31 23:58:44",
            'end_date' => "2019-01-01 00:01:44",
            'cancelled_at' => null,
        ]);
        $event3->BookableExtras()->create([
            "name" => "Trophy",
            "description" => "Fan Trophy",
            "external_path" => "Chelsea Fc",
            "optional" => "Yes",
            "price" => 1.00,
            "extras_per_person" => 1,
            "amount_available" => 10000,
            "cancelled_at" => "2020-01-01 00:01:44",
        ]);
    }
}
