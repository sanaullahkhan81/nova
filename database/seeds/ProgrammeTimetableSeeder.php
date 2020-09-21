<?php

use App\Channel;
use App\ProgrammeTimetable;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProgrammeTimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now();
        $x=1;

        $channels_uuid = Channel::first()['channel_uuid'];


        $cbs = [
                [   'channel_uuid' => $channels_uuid,
                    'programme_name' => 'NCIS (2003)',
                    'start_date' => $now,
                    'start_time' => '09:00',
                    'end_time'   => '10:00',
                    'duration'   => '3600'
                ],
                [   'channel_uuid' => $channels_uuid,
                    'programme_name' => 'NCIS: Los Angeles (2009)',
                    'start_date' => $now->addDay(),
                    'start_time' => '10:00',
                    'end_time'   => '12:00',
                    'duration'   => '7200'
                ],
                [   'channel_uuid' => $channels_uuid,
                    'programme_name' => 'Blue Bloods (2010)',
                    'start_date' => $now->addDays(2),
                    'start_time' => '12:00',
                    'end_time'   => '12:30',
                    'duration'   => '1800'
                ],

        ];



        foreach($cbs as $row){
            ProgrammeTimetable::create($row);
        }

       $fox_uuid = Channel::skip(1)->first()['channel_uuid'];

        $fox = [
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'The Simpsons (1989)',
                'start_date' => $now->addDay(),
                'start_time' => '08:00',
                'end_time'   => '10:00',
                'duration'   => '7200'
            ],
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'Family Guy',
                'start_date' => $now->addDays(3),
                'start_time' => '10:00',
                'end_time'   => '11:30',
                'duration'   => '5400'
            ],
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'Duncanville',
                'start_date' => $now,
                'start_time' => '11:30',
                'end_time'   => '13:00',
                'duration'   => '5400'
            ]

        ];

        foreach($fox as $row){
            ProgrammeTimetable::create($row);
        }

        $fox_uuid = Channel::skip(2)->first()['channel_uuid'];

        $abc = [
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'The Drive',
                'start_date' => $now,
                'start_time' => '09:00',
                'end_time'   => '10:00',
                'duration'   => '3600'
            ],
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'XXX',
                'start_date' => $now,
                'start_time' => '10:00',
                'end_time'   => '11:00',
                'duration'   => '3600'
            ],
            [   'channel_uuid' => $fox_uuid,
                'programme_name' => 'Breakfast News',
                'start_date' => $now,
                'start_time' => '11:00',
                'end_time'   => '12:00',
                'duration'   => '3600'
            ],

        ];

        foreach($abc as $row){
            ProgrammeTimetable::create($row);
        }






    }
}
