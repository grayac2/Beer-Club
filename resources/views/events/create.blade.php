@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Create an Event</h2>
                {!! Form::open(['action' => 'EventController@store', 'class' => 'form-horizontal']) !!}
                {!! Form::bsText('Name'); !!}
                {!! Form::date('Date'); !!}
                {!! Form::time('Time'); !!}
                {!! Form::bsText('Location') !!}
                {!! Form::bsText('Description'); !!}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Create Event', ['class' => 'btn btn-default ']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection