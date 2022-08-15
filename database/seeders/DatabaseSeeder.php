<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create some teams...
        \App\Models\Team::factory()->create([
            'name' => 'Faulcon DeLacy',
            'owner_id' => 2
        ]);
        \App\Models\Team::factory()->create([
            'name' => 'Core Dynamics',
            'owner_id' => 4
        ]);
        \App\Models\Team::factory()->create([
            'name' => 'Azimuth Biochemicals',
            'owner_id' => 1
        ]);
        \App\Models\Team::factory(2)->create();

        // Create some Activities...
        \App\Models\Activities::factory(5)->create();
        \App\Models\Activities::factory(2)->mainstage()->points500()->create();

        \App\Models\Activities::factory()->create([
            'name' => 'How To Fursuit 101',
            'points' => 150,
        ]);
        \App\Models\Activities::factory()->create([
            'name' => '2 Hours Volunteering',
            'type' => 'special',
            'points' => 200*2
        ]);
        \App\Models\Activities::factory(5)->create();
        \App\Models\Activities::factory(2)->mainstage()->points500()->create();

        // Create some activity logs...
        \App\Models\LoggedActivities::factory()->create([
            'activity_id' => 1,
            'user_id' => 8,
            'team_id' => 2,
        ]);
        \App\Models\LoggedActivities::factory(3)->create([
            'activity_id' => 2,
            'user_id' => 8,
            'team_id' => 1,
        ]);
        \App\Models\LoggedActivities::factory()->create([
            'activity_id' => 3,
            'user_id' => 8,
            'team_id' => 1,
        ]);

        \App\Models\Activities::factory(5)->create();
        \App\Models\Activities::factory(2)->mainstage()->points500()->create();

        // Create some users.
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory(2)->unverified()->create();

        // Create a consistent known user for us to login with.
        // Password hash defaults to 'password'
        // id should == 8
        \App\Models\User::factory()->create([
            'name' => 'Rico',
            'email' => 'drraccoony@gmail.com',
            'team_id' => 1,
            'is_admin' => 1,
        ]);

        // Basic user for testing
        \App\Models\User::factory()->create([
            'name' => 'Basic User',
            'email' => 'user@gmail.com',
            'team_id' => 1,
            'is_admin' => 0,
        ]);

        // Admin user for testing
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'team_id' => 1,
            'is_admin' => 1,
        ]);
    }
}
