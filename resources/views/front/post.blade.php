@extends('front/layouts/master')
@section('image',asset('front/img/post-bg.jpg'))

@section('content')
<article>
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">

    

          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 mt-3">
                      <div class="card">
                          <div class="card-horizontal">
                              <div class="img-square-wrapper">
                                  <img class="" src="@if(isset($posts->image)){{ url('/uploads') . '/' . $posts->image }}@endif" alt="Card image cap">
                              </div>
                              
                          </div>
                          <div class="card-body">
                                  <h4 class="card-title">@if($posts){{$posts->title}}@endif</h4>
                                  <p class="card-text">@if($posts){{$posts->body}}@endif</p>
                              </div>
                          <div class="card-footer">
                              <small class="text-muted">Posted from @if($posts){{$posts->created_at->diffForHumans()}}@endif</small>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



          <!-- Write a comment -->
<hr>
 @if(Auth::check())
	<div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>
		<div class="card-body">
			<!-- <form method="POST" action="/posts/{{$posts->id}}/comments"> -->
				<!-- {{csrf_field()}} -->

				<div class="form-group">
					<textarea name="body" id="comment" placeholder="Your Comment here.." class="form-control" rows="3"></textarea>
				</div>
        <button type="submit" id="addComment" class="btn btn-primary">Add Comment</button>
				
			<!-- </form>	 -->
		@include('front.layouts.errors')
		</div>
	</div>	

  @else

  <p>To Comment you have to be logged in, <a href="{{url('/user/login')}}">Login Now</a></p>

  @endif

  <input type="text" hidden name="user_id" value="@if(!is_null(Auth::user())){{Auth::user()->id}} @else 0 @endif" id="user_id">

  <!-- Single Comment -->

  <div class="comments">
		<ul class="list-group" id='comment_list'>
			@if($posts && isset($posts->comments))
        @foreach($posts->comments as $comment)
          @if($comment)
            <li class="list-group-item comments" id="comment-{{$comment->id}}">
              
              @if(isset($comment->user) && isset($comment->user->name))
                <div class="comment_user"><strong >	{{$comment->user->name}} :&nbsp;&nbsp;&nbsp;
                </strong>
                </div>
              @endif

              <div class="comment_body">{{$comment->body}}</div>
                <div class="comment_created">
              <strong class="float-right">

              {{ $comment->created_at ->diffForHumans() }} 
              </strong>
              </div>
              

            </li>
          @endif
        @endforeach
      @endif

		</ul>

	</div>
  
</div>

          
        </div>

      </div>
    </div>
  </article>

  <hr>

@endsection
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
 
<script type="text/javascript">


    $(document).on('click', '#addComment',function(e){
     
          var comment = $('#comment').val();
          var post = '<?php echo $posts->id ?>';
          var user_id = $('#user_id').val();
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: '{!! route('addComment') !!}',
            data: {"_token": "{{ csrf_token() }}",'post':post,'body' : comment,'user_id':user_id},
            success: function(response){

              // var created_at = 
              console.log(response);
              var clone_comment = $('.comments:last').clone().appendTo('#comment_list');
            $('.comments:last').attr('id','comment-'+response.id);
            $('#comment-'+response.id+' .comment_user').html('<strong style="margin:5px;" >'+response.user.name+' :</strong>');
           
            $('#comment-'+response.id+' .comment_body').html(response.body);

            $('#comment-'+response.id+' .comment_created').html('<strong style="float:right;" >'+response.created+' :</strong>'); 
              $('#comment').val('');
          },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            // console.log(JSON.stringify(jqXHR));
            // console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
          }
          });
});

</script>
 