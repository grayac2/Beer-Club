@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Events <span style="float: right;"><a href="/events/create" class="btn btn-success btn-xs">Create New Event</a></span></div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table datatable-event">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        {{--<table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th><th>Date</th><th>Time</th><th>Location</th><th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{$event->name}}</td><td>{{$event->date}}</td><td>{{$event->time}}</td><td>{{$event->location}}</td><td>{{$event->description}}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.datatable-event').DataTable({
            serverSide: true,
            processing: false,
            "ajax": {
                "url": "/event-data",
                "type": "POST",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            "ordering": true,
            "searching": false,
            "bLengthChange": false,
            columns: [
                {data: 'name'},
                {data: 'date'},
                {data: 'time'},
                {data: 'location'},
                {data: 'description'},
            ]
        });
    </script>
@endsection