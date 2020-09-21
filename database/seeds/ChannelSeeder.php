<?php

use App\Channel;
use Illuminate\Database\Seeder;


class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $channels = [
            ['name' => 'CBS','icon' => 'icon/image/cbs.png'],
            ['name' => 'ABC','icon' => 'icon/image/cbs.abc'],
            ['name' => 'FOX','icon' => 'icon/image/cbs.fox'],
            ['name' => 'PBS','icon' => 'icon/image/cbs.pbs'],
        ];



        foreach($channels as $row){
            Channel::create($row);
        }

    }
}
