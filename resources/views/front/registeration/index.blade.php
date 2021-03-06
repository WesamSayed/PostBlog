@extends('front/layouts/master')

@section('image',asset('front/img/home-bg.jpg'))


@section('content')

<div class="row">

        <div class="col-md-12" id="register">

            @if($errors->any())

            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>   

            @endif

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>
                    <hr>
                    <form action="/user/register" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="textrea" name="phone" placeholder="Phone" id="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    @endsection