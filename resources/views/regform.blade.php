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
                    <form action="{{ url('/register-applicant/') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h3 align="center">Registration Form</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Applicant's Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Applicant's Name" require>
                                    @if ($errors->has('name'))
                                        <label class="text-danger">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" require>
                                    @if ($errors->has('email'))
                                        <label class="text-danger">{{ $errors->first('email') }}</label>
                                    @endif
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
                                    @if ($errors->has('division_id'))
                                        <label class="text-danger">{{ $errors->first('division_id') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select id="district" name="district_id" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                    @if ($errors->has('district_id'))
                                        <label class="text-danger">{{ $errors->first('district_id') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="upazila">Upazila / Thana </label>
                                    <select id="upazila" name="upazila_id" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                    @if ($errors->has('upazila_id'))
                                        <label class="text-danger">{{ $errors->first('upazila_id') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address Details</label>
                                    <textarea id="address" name="address" class="form-control" require></textarea>
                                    @if ($errors->has('address'))
                                        <label class="text-danger">{{ $errors->first('address') }}</label>
                                    @endif
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Education Qualification </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Exam name</th>
                                            <th>Institute</th>
                                            <th>Board</th>
                                            <th>Result</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="educationPart">
                                    </tbody>
                                </table>
                            </div>
                            <div class="offset-md-10 col-md-2">
                                <a type="button" class="btn btn-info" href="javascript:addMoreEducation();">Add more</a>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo">Applicant's Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control-file" require>
                                    @if ($errors->has('photo'))
                                        <label class="text-danger">{{ $errors->first('photo') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cv">Applicant's CV</label>
                                    <input type="file" id="cv" name="cv" class="form-control-file" require>
                                    @if ($errors->has('cv'))
                                        <label class="text-danger">{{ $errors->first('cv') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="">Training</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="training" id="option1" value="0" checked>
                                    <label class="form-check-label" for="option1">
                                        No
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="training" id="option2" value="1">
                                    <label class="form-check-label" for="option2">
                                        Yes
                                    </label>
                                </div><br>
                            </div>

                            <div id="traningData" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Training Name</th>
                                                <th>Training Details</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="trainingRow">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="offset-md-10 col-md-2">
                                    <a type="button" class="btn btn-info" href="javascript:addMoreTraining();">Add more</a>
                                </div>
                            </div>

                            <div class="col-md-12 submit-btn">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a type="button" class="btn btn-danger" href="{{ url('/') }}">Back to Log-in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endSection

@section('js')

    <script>
        var j = 0;
        var x = 0;

        $(function(){
            $('#traningData').hide();

            $('#division').change(function(){
                loadDistrict();
            });

            $('#district').change(function(){
                loadUpozila();
            });

            $('input[name="training"]').change(function(){
                showTraning();
            });

            addMoreEducation();
        });

        function loadDistrict(){
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
                }
            });
        }

        function showTraning(){
            var traning = $('input[name="training"]:checked').val();
            if(traning == 1){
                $('#traningData').show();
            }else{
                $('#traningData').hide();
            }
        }

        function addMoreEducation(){
            var html = '<tr id="row'+j+'">'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<select class="form-control" name="exam[]">'+
                                        '<option value="">Select One</option>'+
                                        '@foreach($exam as $row)'+
                                            '<option value="{{ $row->id }}">{{ $row->exam_name }}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" name="institute[]">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<select class="form-control" name="board[]">'+
                                        '<option value="">Select One</option>'+
                                        '@foreach($board as $row)'+
                                            '<option value="{{ $row->id }}">{{ $row->board_name }}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" name="result[]">'+
                                '</div>'+
                            '</td>'+
                            '<td><a type="button" class="btn btn-danger" href="javascript:removeEduRow('+j+');">Remove</a></td>'+
                        '</tr>';

            j++;
            $('#educationPart').last().append(html);
        }

        function removeEduRow(id){
            $('#row'+id).remove();
        }

        function addMoreTraining(){
            var html = '<tr id="train'+x+'">'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" name="trainingName[]" class="form-control">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" name="trainingDetails[]" class="form-control">'+
                                '</div>'+
                            '</td>'+
                            '<td><a type="button" class="btn btn-danger" href="javascript:removeTrainRow('+x+');">Remove</a></td>'+
                        '</tr>';
            x++;
            $('#trainingRow').last().append(html);
        }

        function removeTrainRow(id){
            $('#train'+id).remove();
        }
    </script>

@endSection
