@extends('layouts.main-layout')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h3 align="center">Registration Form</h3>
                            </div>
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
                                    <select id="division" name="division" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select id="district" name="district" class="form-control" require>
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="upazila">Upazila / Thana </label>
                                    <select id="upazila" name="upazila" class="form-control" require>
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
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" name="exam[]">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="institute[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" name="board[]">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="result[]">
                                                </div>
                                            </td>
                                            <td><a type="button" class="btn btn-danger" href="">Remove</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a align="right" type="button" class="btn btn-info" href="">Add more</a>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo">Applicant's Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control" require>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cv">Applicant's CV</label>
                                    <input type="file" id="cv" name="cv" class="form-control" require>
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

                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Training Name</th>
                                            <th>Training Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="trainingName[]"></td>
                                            <td><input type="text" name="trainingDetails[]"></td>
                                            <td><a type="button" class="btn btn-danger" href="">Remove</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a align="right" type="button" class="btn btn-info" href="">Add more</a>
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

@endSection
