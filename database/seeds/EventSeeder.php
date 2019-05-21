<?php

use App\Models\User;
use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, 12)
            ->create()
            ->each(function ($event) {

                if ($event->id == 1) {
                    // // Manually add photos
                    // for ($i=0; $i < 8; $i++) { 
                    //     $event->photos()->create(factory(EventPhoto::class)->make()->toArray());
                    // }
                    $event->ig_hashtag = '2019JadiWebDeveloper';
                    $event->ig_hashtag_status = 'pending';
                    $event->save();
                }


                User::byMember()->active()->limit(10)->get()->each(function ($m) use ($event) {
                    $event->participants()->attach($m->id, [
                        'status' => Event::PARTICIPANT_STATUS_CONFIRM,
                        'role' => Event::PARTICIPANT_ROLE_MEMBER
                    ]);
                });

                User::byEditor()->limit(5)->get()->each(function ($m) use ($event) {
                    $event->participants()->attach($m->id, [
                        'status' => Event::PARTICIPANT_STATUS_CONFIRM,
                        'role' => 'speaker'
                    ]);
                });
            });
    }
}