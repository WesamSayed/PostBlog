@extends('Admin.layouts.master')

@section('page')

View Posts

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
        @include('Admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">All Posts</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        
                        
                        <td><img src="{{url('/uploads').'/'.$post->image}}"alt="{{$post->image}}" class="img-thumbnail"
                                    style="width: 50px"></td>
                        <td>
                            {!! Form::open(['route' => ['posts.destroy', $post->id] , 'method'=>'DELETE' ])!!}

                            {{Form::button('<span class="fa fa-trash"></span>',['type'=>'submit', 'class'=>'btn btn-sm btn-danger','onClick'=>'return confirm("Are You Sure ? ")' ])}}

                            {{link_to_route('posts.edit','',$post->id,['type'=>'submit', 'class'=>'btn btn-sm btn-info ti-pencil-alt'])}}
                            {{link_to_route('posts.show','',$post->id,['type'=>'submit', 'class'=>'btn btn-sm btn-primary ti-view-list-alt' ])}}
                            
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection