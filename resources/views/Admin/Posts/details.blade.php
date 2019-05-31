@extends('Admin.layouts.master')

@section('page')

Details

@endsection


@section('content')

 				<div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Post Detail</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <th>ID</th>
                                            <td>{{$posts->id}}</td>
                                        </tr>

                                        <tr>
                                            <th>Title</th>
                                            <td>{{$posts->title}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Description</th>
                                            <td>{{$posts->body}}</td>
                                        </tr>

                                        <tr>
                                            <th>Image</th>
                                            <td><img src="{{url('/uploads'). '/' . $posts->image}}" alt="" class="img-thumbnail" style="width: 150px;"></td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>

@endsection