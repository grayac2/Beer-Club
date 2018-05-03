@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Types <span style="float: right;"></span></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Beer Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td><a href="{{action('TypeController@show', ['id' => $type->id])}}">{{$type->name}}</a></td>
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
