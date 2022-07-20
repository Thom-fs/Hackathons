<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Lister un slot */

    public function index()
    {
        $slots = Slot::all();

        return response()->json(["slots" => $slots]);
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
            'title' => 'required|string',
            'start' => 'required|string',
            'duration' => 'required|string',
            'teams' => 'required|string'
        ]);

        $slot = Slot::create([
            'title' => $request->title,
            'start' => $request->start,
            'duration' => $request->duration,
            'teams' => $request->teams,
        ]);

        return response()->json(['message' => 'Créneau créé', 'slot' => $slot], 201);
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
}
