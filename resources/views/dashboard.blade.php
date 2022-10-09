@extends('layouts.main-layout')

@section('content')


    <div class="container">
        @if(Session::get('msg'))
            {!! Session::get('msg') !!}
        @endif
        @php
            Session::forget('msg');
        @endphp

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="applicentTable" class="table">
                            <thead>
                                <tr>
                                    <th>Applicant's Name</th>
                                    <th>Email Address</th>
                                    <th>Division</th>
                                    <th>District </th>
                                    <th>Upazila / Thana</th>
                                    <th>Insert Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endSection

@section('js')

    <script>
        $(function(){
            $('#applicentTable').DataTable( {
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url':'{{ url('/load-applicant-list/') }}'
                },
                columns: [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'division_name'},
                    { data: 'district_name' },
                    { data: 'upazilla_name' },
                    { data: 'created_at' },
                    { data: 'action' }
                ]
            });
        });
    </script>

@endSection
