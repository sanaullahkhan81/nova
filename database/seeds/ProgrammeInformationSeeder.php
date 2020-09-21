<?php

use App\ProgrammeInformation;
use App\ProgrammeTimetable;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProgrammeInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $prog_timetable =   ProgrammeTimetable::all();
      foreach($prog_timetable as $row){
          $faker = Faker::create();
          $data =  [   'programme_uuid' => $row->programme_uuid,
              'channel_uuid'  => $row->channel_uuid,
              'description'  => $faker->paragraph,
              'thumbnail' => $faker->image($dir = '/tmp', $width = 300, $height = 300),
          ];
          ProgrammeInformation::create($data);


      }
    }
}
