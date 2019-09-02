<section class="sample-text-area">
				<div class="container">
				  <h2>Comments</h2>
          @if(Auth::user())
				  <form action="/article/{{$article->id}}/store-comment" method="POST">
            {{ csrf_field() }}
				     <div class="form-group">
					    <label for="exampleFormControlTextarea1">Add Comment:</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
					  </div>
             <div class="form-group">
             <button type="submit" class="btn btn-primary" id="addcomment">Create</button>
           </div>
				  </form>
          @else
          <h6>Please <a href="/login">login</a> or <a href="/register">register</a> to add comment</h6>
          @endif

          @if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

				  <div class="list-group">
  @foreach($comments as $comment)
  <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1">{!! $comment->user->name !!}</h6>
      <small class="text-muted">{!! $comment->created_at !!}</small>
    </div>
    <p class="mb-1">{!! $comment->text !!}</p>
   
  </div>
  @endforeach

				</div>

        <div >
  {{ $comments->links( "pagination::bootstrap-4") }}
 </div>


			</section>

      <script type="text/javascript">
        
        $("#addcomment").click(function(){
            alert("Comment is placed in a moderation queue and, if approved, it will appear shortly.");
        });

      </script>