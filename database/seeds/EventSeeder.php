<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;  // ← PENTING! Harus pakai "Factory as Faker"
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $categories = ['Music', 'Seminar', 'Workshop', 'Sport', 'Exhibition', 'Conference', 'Entertainment', 'Technology'];
        $statuses = ['upcoming', 'ongoing', 'completed', 'cancelled'];
        $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Bali', 'Medan', 'Semarang', 'Makassar'];
    
        for ($i = 1; $i <= 100; $i++) {
            Event::create([
                'event_name' => $faker->sentence(4, true),
                'organizer' => $faker->company,
                'category' => $faker->randomElement($categories),
                'location' => $faker->streetAddress . ', ' . $faker->randomElement($cities),
                'event_date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'start_time' => $faker->time('H:i:s'),
                'end_time' => $faker->time('H:i:s'),
                'ticket_price' => $faker->numberBetween(0, 1000000),
                'capacity' => $faker->numberBetween(50, 10000),
                'description' => $faker->paragraph(3),
                'status' => $faker->randomElement($statuses)
            ]);
        }
    }
}