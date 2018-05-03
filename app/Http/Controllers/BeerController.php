<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beers.index');
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
    public function show(Beer $beer)
    {
        return view('beers.show')->with('beer', $beer);
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

    public function beerData(DataTables $dataTables) {
        return $dataTables->collection(
            \DB::table('beers')
                ->select('beers.id as id', 'br.name as brandname', 'beers.name as beername', 'bt.name as typename', \DB::raw('AVG(r.rating) as rating'))
                ->join('reviews as r', 'beers.id', '=', 'r.beer_id')
                ->join('beer_types as bt', 'bt.id', '=', 'beers.beer_type_id')
                ->join('brands as br', 'br.id', '=', 'beers.brand_id')
                ->groupBy('id', 'brandname', 'beername', 'typename')
                ->get()
        )->toJson();
    }
}
