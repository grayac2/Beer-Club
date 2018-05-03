@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Rate a Beer</h2>
                {!! Form::open(['action' => 'ReviewController@store', 'class' => 'form-horizontal']) !!}
                {!! Form::bsText('Brand', $beer == null ? "" : $beer->brand->name); !!}
                {!! Form::bsText('Name', $beer == null ? "" : $beer->name); !!}
                {!! Form::bsText('Type', $beer == null ? "" : $beer->beerType->name); !!}
                {!! Form::rating('rating') !!}
                {!! Form::bsText('Comment'); !!}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Rate!', ['class' => 'btn btn-default ']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection