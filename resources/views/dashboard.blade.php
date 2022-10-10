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

    <div class="modal fade bs-example-modal-lg" id="editFrom" role="dialog" aria-labelledby="examConfigModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                            <div class="header">
                                <h3><strong>Applicant </strong> Edit <button type="button" class="close" data-dismiss="modal">&times;</button></h3>
                            </div>
                            <form id="applicantForm" action="">
                                <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Applicant's Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Applicant's Name" require>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" require>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Mailing Address</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="division">Division </label>
                                    <select id="division" name="division_id" class="form-control" require>
                                        <option value="">Select One</option>
                                        @foreach($division as $row)
                                            <option value="{!! $row->id !!}">{!! $row->division_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select id="district" name="district_id" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="upazila">Upazila / Thana </label>
                                    <select id="upazila" name="upazila_id" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address Details</label>
                                    <textarea id="address" name="address" class="form-control" require></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Language Proficiency </label>
                                </div>
                            </div>

                            <div class="offset-md-2 col-md-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="bangla" name="bangla" value="1">
                                    <label class="form-check-label" for="bangla">Bangla</label>
                                </div>
                            </div>

                            <div class="offset-md-2 col-md-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="english" name="english" value="1">
                                    <label class="form-check-label" for="english">English</label>
                                </div>
                            </div>

                            <div class="offset-md-2 col-md-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="french" name="french" value="1">
                                    <label class="form-check-label" for="french">French</label>
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-primary" href="javascript:save();">Save</a>
                </div>
            </div>
        </div>
    </div>


@endSection

@section('js')

    <script>
        var actionUrl = '';
        var upazila_id = 0;

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

            $('#division').change(function(){
                loadDistrict();
            });

            $('#district').change(function(){
                loadUpozila();
            });
        });

        function loadDistrict(id = null){
            var division = $('#division').val();
            $.ajax({
                url: '{{ url("/district-list/") }}/'+ division,
                datatype: 'json',
                type: 'GET',
                success: function(data){
                    var html = '<option value="">Select One</option>';

                    for(var i = 0; data.length > i; i++){
                        html += '<option value="'+ data[i].id +'">'+ data[i].district_name +'</option>';
                    }

                    $('#district').html(html);
                    if(id != null){
                        $('#district').val(id);
                        loadUpozila();
                    }
                }
            });
        }

        function loadUpozila(){
            var district = $('#district').val();
            $.ajax({
                url: '{{ url("/upozilla-list/") }}/' + district,
                datatype: 'json',
                type: 'GET',
                success: function(data){
                    var html = '<option value="">Select One</option>';

                    for(var i = 0; data.length > i; i++){
                        html += '<option value="'+ data[i].id +'">'+ data[i].upazilla_name +'</option>';
                    }

                    $('#upazila').html(html);
                    if(upazila_id > 0){
                        $('#upazila').val(upazila_id);
                    }
                }
            });
        }

        function editRow(id){
            $('#applicantForm').trigger('reset');
            $.ajax({
                url: '{{ url("/applicant-info/") }}/' + id,
                datatype: 'json',
                type: 'GET',
                success: function(data){
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#division').val(data.division_id);
                    upazila_id = data.upazila_id;
                    loadDistrict(data.district_id);

                    $('#address').val(data.address);

                    if(data.bangla == 1){
                        $("#bangla").attr('checked','checked');
                    }

                    if(data.english == 1){
                        $("#english").attr('checked','checked');
                    }

                    if(data.french == 1){
                        $("#french").attr('checked','checked');
                    }
                    actionUrl = '{{ url("api/applicant-info-update/") }}/' + data.id;

                    $('#editFrom').modal('show');
                }
            });
        }

        function save(){
            var name =$('#name').val();
            var email =$('#email').val();
            var division =$('#division').val();
            var address =$('#address').val();
            var district =$('#district').val();
            var upazila =$('#upazila').val();
            var bangla =$('input[name="bangla"]:checked').val();
            var english =$('input[name="english"]:checked').val();
            var french =$('input[name="french"]:checked').val();

            $.ajax({
                url: actionUrl,
                datatype: 'json',
                type: 'post',
                data: {
                    'name' : name,
                    'email' : email,
                    'division_id' : division,
                    'address' : address,
                    'district_id' : district,
                    'upazila_id' : upazila,
                    'bangla' : bangla,
                    'english' : english,
                    'french' : french,
                },
                success: function(data){
                    if(data.success){
                        alert(data.success);
                        $('#editFrom').modal('hide');
                        $('#applicantForm').trigger('reset');
                        reloadDataTable();
                    }else if(data.msg){
                        alert(data.msg);
                    }else{
                        alert(data.success);
                    }
                },
                error: function(){

                }
            });
        }

        function reloadDataTable(){
            $('#applicentTable').DataTable().ajax.reload();
        }
    </script>

@endSection
