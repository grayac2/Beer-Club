@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Beer Listing <span style="float: right;"></span></div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table datatable-review">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var table = $('.datatable-review').DataTable({
            serverSide: true,
            processing: false,
            "ajax": {
                "url": "/beer-data",
                "type": "POST",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            "ordering": true,
            "searching": true,
            "bLengthChange": false,
            columns: [
                {data: 'brandname'},
                {data: 'beername'},
                {data: 'typename'},
                {data: 'rating'},
                {
                    "defaultContent": "<button class='btn btn-xs btn-default'>View</button>",
                    "sortable": false
                }
            ]
        });

        $('.datatable-review tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = window.location.protocol + "//" + window.location.host + "/" + "beers/" + data.id;
        } );
    </script>
@endsection