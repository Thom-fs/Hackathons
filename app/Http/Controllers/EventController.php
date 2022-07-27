<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /* Lister un event */

    public function index()
    {
        $events = Event::all();

        return response()->json(["events" => $events]);
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

    /* Création d'un event */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start' => 'required|string',
            'end' => 'required|string',
            'location' => 'required|string'
        ]);

        $event = Event::create([
            'name' => $request->name,
            'start' => $request->start,
            'end' => $request->end,
            'location' => $request->location,
        ]);

        return response()->json(['message' => 'Evènement créé', 'event' => $event], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return response()->json(['message' => '', 'event' => $event], 200);
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
    public function destroyEvents($id)
    {
        $events = Event::find($id);
        $events->delete();
    }
}
