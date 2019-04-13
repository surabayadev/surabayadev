<?php

use Illuminate\Database\Seeder;
use App\Models\EventDocumentaion;

class EventDocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'event_id' => 1,
                'photo' => 'sbydevfamily.jpg'
            ],
            [
                'event_id' => 1,
                'photo' => 'discussion.jpg'
            ],
            [
                'event_id' => 2,
                'photo' => 'sbydevfamily.jpg'
            ],
            [
                'event_id' => 2,
                'photo' => 'discussion.jpg'
            ]
        ];

        foreach($data as $d){
            EventDocumentaion::create($d);
        }
    }
}
