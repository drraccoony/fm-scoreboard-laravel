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
            'name' => 'Alpha Team',
            'owner_id' => 2
        ]);
        \App\Models\Team::factory()->create([
            'name' => 'Bravo Team',
            'owner_id' => 4
        ]);
        \App\Models\Team::factory()->create([
            'name' => 'Charlie Team',
            'owner_id' => 1
        ]);

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
        \App\Models\Activities::factory()->create([
            'name' => 'Harassed Kal\'hona',
            'type' => 'special',
            'points' => 750
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
        ]);
    }
}
