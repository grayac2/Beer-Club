@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Beer Type: {{$type->name}} <span style="float: right;"></span></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Beer</th><th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($type->beers as $beer)
                                <tr>
                                    <td><a href="{{action('BeerController@show', ['id' => $beer->id])}}">{{$beer->name}}</a></td><td>{{$beer->description}}</td>
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
