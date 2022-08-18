<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Activities;
use App\Models\LoggedActivities;
use App\Models\User;
use Ramsey\Uuid\Guid\Guid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (getenv("APP_ENV") === 'production') {
            // Create basic team
            $team = new Team();
            $team->id = 1;
            $team->name = 'First Team';
            $team->color = '#4e4ede';
            $team->save();

            // Create basic activity
            $activity = new Activities();
            $activity->id = 1;
            $activity->name = 'First Activity';
            $activity->type = 'Panel';
            $activity->points = 1;
            $activity->guid = Guid::uuid4();
            $activity->save();

            // Create root user
            $user = new User();
            $user->id = 1;
            $user->name = 'Root';
            $user->email = 'root@notAGmail.com';
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->is_admin = true;
            $user->save();
        } else if (getenv("APP_ENV") === 'stage') {
            // Create basic team
            $team = new Team();
            $team->id = 1;
            $team->name = 'First Team';
            $team->color = '#4e4ede';
            $team->save();

            // Create basic activity
            $activity = new Activities();
            $activity->id = 1;
            $activity->name = 'First Activity';
            $activity->type = 'Panel';
            $activity->points = 1;
            $activity->guid = Guid::uuid4();
            $activity->save();

            // Create root user
            $user = new User();
            $user->id = 1;
            $user->name = 'Root';
            $user->email = 'root@notAGmail.com';
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->is_admin = true;
            $user->save();
        } else {
            // Create some teams...
            Team::factory()->create([
                'name' => 'Faulcon DeLacy',
                'owner_id' => 2
            ]);
            Team::factory()->create([
                'name' => 'Core Dynamics',
                'owner_id' => 4
            ]);
            Team::factory()->create([
                'name' => 'Azimuth Biochemicals',
                'owner_id' => 1
            ]);
            Team::factory(2)->create();

            // Create some Activities...
            Activities::factory(5)->create();
            Activities::factory(2)->mainstage()->points500()->create();

            Activities::factory()->create([
                'name' => 'How To Fursuit 101',
                'points' => 150,
            ]);
            Activities::factory()->create([
                'name' => '2 Hours Volunteering',
                'type' => 'special',
                'points' => 200 * 2
            ]);
            Activities::factory(5)->create();
            Activities::factory(2)->mainstage()->points500()->create();

            // Create some activity logs...
            LoggedActivities::factory()->create([
                'activity_id' => 1,
                'user_id' => 8,
                'team_id' => 2,
            ]);
            LoggedActivities::factory(3)->create([
                'activity_id' => 2,
                'user_id' => 8,
                'team_id' => 1,
            ]);
            LoggedActivities::factory()->create([
                'activity_id' => 3,
                'user_id' => 8,
                'team_id' => 1,
            ]);

            Activities::factory(5)->create();
            Activities::factory(2)->mainstage()->points500()->create();

            // Create some users.
            User::factory(5)->create();
            User::factory(2)->unverified()->create();

            // Create a consistent known user for us to login with.
            // Password hash defaults to 'password'
            // id should == 8
            User::factory()->create([
                'name' => 'Rico',
                'email' => 'drraccoony@gmail.com',
                'team_id' => 1,
                'is_admin' => 1,
            ]);

            // Basic user for testing
            User::factory()->create([
                'name' => 'Basic User',
                'email' => 'user@gmail.com',
                'team_id' => 1,
                'is_admin' => 0,
            ]);

            // Admin user for testing
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'team_id' => 1,
                'is_admin' => 1,
            ]);
        }
    }
}
