@extends('layouts.app')

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        .title {
            font-family: 'Raleway', sans-serif;
            align-items: center;
            text-align: center;
            justify-content: center;
            font-weight: 100;
            font-size: 84px;
            margin-top: 200px;
            padding-top: 30px;
            padding-bottom: 30px;
            background-color: rgba(0, 0, 0, 0.3);
        }

        html,
        body {
            height: 100% !important;
            color: #ffffff;
            margin: 0;
            background-image: url("/img/background.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-color: #000000;
            background-size: cover;
        }

    </style>
@endsection

@section('content')
    <div class="title">
        Beer Club
        <h3>Your spot for all things beer</h3>
    </div>
@endsection