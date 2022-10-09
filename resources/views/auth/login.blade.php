@extends('layouts.main-layout')

@section('content')


<div class="container-sm">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h3 align="center">Log-in</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" require>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" require>
                                </div>
                            </div>

                            <div class="col-md-12 submit-btn">
                                <button type="submit" class="btn btn-success">Login</button>
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
