<?php

namespace App\Http\Controllers;

use App\ProgrammeTimetable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgrammeTimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  string   $channel
     * @param  string   $date
     * @param  string   $timezone   - base64 encoded value of valid identifier from https://www.php.net/manual/en/timezones.php
     * @return \Illuminate\Http\Response
     */
    public function index($channel,$date,$timezone)
    {
        // converting timezone code (QXNpYS9Lb2xrYXRh) to readable timezone ('India/Calcutta')
        $timezone       =   base64_decode($timezone);
        $date = Carbon::createFromFormat('Y-m-d', $date, $timezone);
        $date->setTimezone('UTC');

        $programme = ProgrammeTimetable::select('programme_uuid','programme_name','start_time','end_time','duration')
                                        ->whereChannelUuid($channel)
                                        ->whereDate('start_date',$date)
                                        ->get();

        // Convert start and end time to given timezone
        $data =  $programme->map(function($a) use($timezone){
            $a->start_time  =   Carbon::parse($a->start_time, 'UTC')->setTimezone($timezone)->toTimeString();
            $a->end_time    =   Carbon::parse($a->end_time, 'UTC')->setTimezone($timezone)->toTimeString();
            return $a;
        });

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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


    /**
     * List of programme with timetable.
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function list(){

       $data = ProgrammeTimetable::get();
       return response($data, 200);

    }


}
