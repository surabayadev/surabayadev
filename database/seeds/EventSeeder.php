<?php

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
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
        $data = [
            [
                'user_id' => 1,
                'name' => 'Pengenalan Vue JS',
                'pemateri' => 'Riyan Satria',
                'slug' => Str::slug('Pengenalan Vue JS'),
                'cover' => 'vuejs.png',
                'description' => 'workshop dasar vue js',
                'content' => 'workshop untuk mengenalkan dasar vue js',
                'tanggal' => Carbon::parse('2019-01-07')        
            ],
            [
                'user_id' => 1,
                'name' => 'Workshop GO Language',
                'pemateri' => 'Doni Rubiantara',
                'slug' => Str::slug('Workshop GO Language'),
                'cover' => 'vuejs.png',
                'description' => 'Belajar dasar golang untuk pemula',
                'content' => 'workshop untuk mengenalkan dasar golang',
                'tanggal' => Carbon::parse('2019-01-08')        
            ]
        ];

        foreach ($data as $d) {
            Event::create($d);
        }

    }
}
