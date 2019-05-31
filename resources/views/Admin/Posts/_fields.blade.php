<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {{ Form::label('title', 'Post Title') }}
    {{ Form::text('title',$posts->title,['class'=>'form-control border-input','placeholder'=>'Enter a Post']) }}
    <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('body', 'Post Description') }}
    {{ Form::textarea('body',$posts->body,['class'=>'form-control border-input','placeholder'=>'Create a New Post']) }}
    <span class="text-danger">{{ $errors->has('body') ? $errors->first('body') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','File') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
</div>

