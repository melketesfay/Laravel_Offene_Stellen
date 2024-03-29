<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Listing;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Junior developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Hostpoint',
        //     'location' => 'Rapperswill TG',
        //     'email' => 'hostpoint@info.com',
        //     'website' => 'https://hostpoint.ch',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, aliquid sed sunt eum accusantium, ex doloribus id a quisquam consectetur necessitatibus veniam perspiciatis cupiditate dignissimos facilis neque ducimus laborum aliquam!'
        // ]);
        // Listing::create([
        //     'title' => 'Full-Stack Software Engineer',
        //     'tags' => 'PHP, Javascript,MySQL,NGINX',
        //     'company' => 'Hostpoint',
        //     'location' => 'Rapperswill TG',
        //     'email' => 'hostpoint@info.com',
        //     'website' => 'https://hostpoint.ch',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, aliquid sed sunt eum accusantium, ex doloribus id a quisquam consectetur necessitatibus veniam perspiciatis cupiditate dignissimos facilis neque ducimus laborum aliquam!'
        // ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
