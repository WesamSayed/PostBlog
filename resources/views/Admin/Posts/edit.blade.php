@extends('Admin.layouts.master')

@section('page')

Edit Product

@endsection


@section('content')
	

 				<div class="row">
                    <div class="col-lg-10 col-md-10">
                    	@include('Admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Product</h4>
                            </div>
                            <div class="content">
                                {!! Form::open(['url' => ['admin/posts', $posts->id], 'files'=> true, 'method'=>'put']) !!}
                                  	@include('Admin.Posts._fields')
                                    <div class="form-group">
                                    	{{Form::submit('Update Post', ['class'=>'btn btn-info btn-fill btn-wdt'])}}
                                    </div>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

@endsection