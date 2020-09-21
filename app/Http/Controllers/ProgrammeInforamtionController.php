<?php

namespace App\Http\Controllers;

use App\ProgrammeInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgrammeInforamtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProgrammeInformation::get();
        return response($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $channel
     * @param $programme
     * @return void
     */
    public function show($channel, $programme)
    {
    $information =    ProgrammeInformation::with('programmeTimetable')
                            ->with('channel')
                            ->whereChannelUuid($channel)
                            ->whereProgrammeUuid($programme)
                            ->first();

    $data = [
        'channel_uuid' => $information['channel_uuid'],
        'programme_name' => $information->programmeTimetable['programme_name'],
        'programme_description' => $information['description'],
        'programme_thumbnail' => $information['thumbnail'],
        'start_time' => $information->programmeTimetable['start_time'],
        'end_time' => $information->programmeTimetable['end_time'],
        'duration' => $information->programmeTimetable['duration'],
        'channel' => $information->channel['name']
    ];

        return response($data, 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
