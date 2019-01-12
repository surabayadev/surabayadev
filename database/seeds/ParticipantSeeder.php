<?php

use Illuminate\Database\Seeder;
use App\Models\EventParticipant;

class ParticipantSeeder extends Seeder
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
                'id_event' => 1,
                'email' => 'nadhif@gmail.com',
                'nama_lengkap' => 'Nadhif',
                'notelp' => '085646742960',
                'status' => 'Mahasiswa',
                'asal_institusi' => 'PENS',           
                'id_telegram' => 'nadhifhayazee',
                'sumber_info' => 'Instagram'     
            ],
            [
                'id_event' => 1,
                'email' => 'aliwildan@gmail.com',
                'nama_lengkap' => 'Ali wildan',
                'notelp' => '085746744530',
                'status' => 'Mahasiswa',
                'asal_institusi' => 'PENS',           
                'id_telegram' => 'aliwildan',
                'sumber_info' => 'dari teman'        
            ]
        ];

        foreach($data as $d){
            EventParticipant::create($d);
        }

    }
}
