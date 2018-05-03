@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Reviews <span style="float: right;"><a href="/review/create" class="btn btn-success btn-xs">Create New Review</a></span></div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table datatable-review">
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        {{--<table class="table">
                            <thead>
                                <tr>
                                    <th>Beer</th><th>Rating</th><th>Comment</th><th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->beer->name}}</td><td>{{$review->rating}}</td><td>{{$review->comment}}</td><td>{{$review->created_at->toDateString()}}</td>
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
        $('.datatable-review').DataTable({
            serverSide: true,
            processing: false,
            "ajax": {
                "url": "/review-data",
                "type": "POST",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            "ordering": true,
            "searching": false,
            "bLengthChange": false,
            columns: [
                {data: 'brandname'},
                {data: 'beername'},
                {data: 'typename'},
                {data: 'rating'},
                {data: 'updated_at'},
            ]
        });
    </script>
@endsection