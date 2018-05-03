<?php

namespace App\Http\Controllers;

use App\Beer;
use App\BeerType;
use App\Brand;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('review.index')->with('reviews', Auth::user()->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $beer = null;
        $id = $request->input('id');
        if($id != null) {
            $beer = Beer::find($id);
        }

        return view('review.create')->with('beer', $beer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'type' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|max:255',
        ]);

        // Try and find the brand the user specified. If it doesn't exist, create it
        $brand = Brand::where('name', $request->brand)->first();
        if(!$brand) {
            $brand = new Brand();
            $brand->name = $request->brand;
            $brand->city = '';
            $brand->state = '';
            $brand->country = '';
            $brand->website = '';
            $brand->save();
        }
        // Try and find the type the user specified. If it doesn't exist, create it
        $type = BeerType::where('name', $request->type)->first();
        if(!$type) {
            $type = new BeerType();
            $type->name = $request->type;
            $type->save();
        }
        // Try and find the beer the user specified. If it doesn't exist, create it
        $beer = Beer::where([
            ['name', $request->name],
            ['brand_id', $brand->id],
            ['beer_type_id', $type->id]
        ])->first();
        if(!$beer) {
            $beer = new Beer();
            $beer->name = $request->name;
            $beer->brand_id = $brand->id;
            $beer->beer_type_id = $type->id;
            $beer->description = '';
            $beer->save();
        }

        // Finally, create the review and add it to the user and the beer.
        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->beer_id = $beer->id;

        // Add the model to the user
        Auth::user()->reviews()->save($review);

        return redirect()->action('ReviewController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
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
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }

    public function reviewData(DataTables $dataTables) {
        return $dataTables->eloquent(
            Auth::user()->reviews()
                ->select('br.name as brandname', 'b.name as beername', 'bt.name as typename', 'reviews.rating as rating', 'b.updated_at as updated_at')
                ->join('beers as b', 'b.id', '=', 'reviews.beer_id')
                ->join('beer_types as bt', 'bt.id', '=', 'b.beer_type_id')
                ->join('brands as br', 'br.id', '=', 'b.brand_id')
        )->toJson();
    }
}
