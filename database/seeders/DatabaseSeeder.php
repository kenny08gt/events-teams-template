<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Teams;
use App\Models\User;
use App\Models\UserPublicData;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::factory(5)->create();

        foreach ($events as $event) {
            $teams = Teams::factory(rand(10, 25))->create([
                'event_id' => $event->id
            ]);



            foreach ($teams as $team) {
                $users = User::factory(rand(10, 25))->create();
                foreach ($users as $user) {
                    $userPublic = UserPublicData::factory()->create([
                        'user_id' => $user->id,
                        'team_id' => $team->id,
                        'event_id' => $event->id,
                        'slug'=> Str::slug(User::select('name')->where('id', $user->id)->first()->name),
                        'goal' => rand(3000, 90000),
                        'raised' => 0
                    ]);

                    Donation::factory(rand(1, 25))->create([
                        'user_id' => $userPublic->user_id,
                        'event_id' => $userPublic->event_id,
                        'created_at' => (new Carbon())->sub(rand(2, 60).' days')
                    ]);
                }

            }

            Volunteer::factory(100)->create([
                'event_id' => $event->id
            ]);
        }


    }
}
