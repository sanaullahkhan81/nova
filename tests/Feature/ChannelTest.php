<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Channel;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Does data exist int channel table.
     * @test
     * @return void
     */
    public function Channels_table_has_fox_channel()
    {
        $this->seed();
        $this->assertDatabaseHas('channels',[
            'name' => 'CBS'
        ]);

    }

    /**
     * rows count in chaneel database.
     * @test
     * @return void
     */

    public function database_count(){
        $this->seed();
        $this->assertDatabaseCount('channels', 4);
    }

    /**
     * List of chanel when http call.
     * @test
     * @return void
     */

    public function list_of_channel_http_call(){
        $this->seed();

        $response = $this->get('api/channels');

        $response->assertStatus(200);

    }


}
