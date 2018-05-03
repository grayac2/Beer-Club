@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Beer "{{$beer->name}}"
                        <span style="float: right;">
                            <a href="{{action('ReviewController@create', ['id' => $beer->id])}}" class="btn btn-success btn-xs">Rate!</a>
                        </span>
                    </div>
                    @php $rating = 0; @endphp
                    @foreach($beer->reviews as $review)
                        @php $rating += $review->rating @endphp
                    @endforeach
                    @php
                        if($beer->reviews->count() > 0) $rating /= $beer->reviews->count();
                        $percentage = ceil(($rating / 5) * 100);
                    @endphp



                    <div class="panel-body">
                        <h2>Average Rating: {{number_format( $rating, 2 )}} / 5</h2>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%;">
                                {{$percentage}}%
                            </div>
                        </div>
                        <hr>
                        <h3>Reviews</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($beer->reviews as $review)
                                <tr>
                                    <td>{{$review->rating}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->user->email}}</td>
                                    <td>{{$review->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
