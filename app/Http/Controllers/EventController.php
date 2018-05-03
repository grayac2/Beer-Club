<?php

namespace App\Http\Controllers;

use App\Beer;
use App\BeerType;
use App\Brand;
use App\Review;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index')->with('events', Event::all());
        //return view('events.index')->with('events', Auth::user()->events);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->toArray());
        $request->validate([
            'name' => 'required|max:255',
            'Date' => 'required',
            'Time' => 'required',
            'location' => 'required|max:255',
            'description' => 'max:255',
        ]);

        // Create the event.
        $event = new Event();
        $event->name = $request->name;
        $event->Date = $request->Date;
        $event->Time = $request->Time;
        $event->location = $request->location;
        $event->description = $request->description;

        // Add the model to the user
        Auth::user()->eventsCreated()->save($event);


        return redirect()->action('EventController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
    

    public function eventData(DataTables $dataTables) {
        return $dataTables->collection(
            \DB::table('events')
                ->select('name', 'date', 'time', 'location', 'description')
                ->get()
        )->toJson();
    }
}
