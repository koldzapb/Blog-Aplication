   @include('admin.header')
<body>
   @include('admin.menu-1')

<div class="container-fluid">
  <div class="row">
    @include('admin.menu')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Comments</h1>
        
      </div>
  <form method="POST" action="/admin/comment/update">
  {{method_field('PUT')}}
  {{ csrf_field() }}
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Article</th>
      <th scope="col">Comment</th>
      <th scope="col">User</th>
      <th scope="col">Validated</th>
    </tr>
  </thead>
   
  <tbody>
    @foreach($comments as $key => $comment)
    <tr>
      <td>{{$comment->created_at}}</td>
      <td ><a href="/admin/article/{{$comment->article->id}}/edit">{{$comment->article->name}}</a></td>
      <td>{{ $comment->text}} <input type="hidden" name="comments[{{$key}}][id]" value="{{$comment->id}}"></td>
      <td>{{ $comment->user->name}}</td>
     
      <td><div class="custom-control custom-checkbox">
                  <input type="checkbox" name="comments[{{$key}}][is_validated]" class="custom-control-input" id="customCheck{{$key}}" value="1" {{($comment->is_validated == 1)?"checked":""}} >
                  <label class="custom-control-label" for="customCheck{{$key}}"></label>
              </div></td>
     
    </tr>
    @endforeach
    
  </tbody>

</table>
<button type="submit" class="btn btn-primary">Edit</button>
</form>
<nav aria-label="Page navigation example">

{{ $comments->links( "pagination::bootstrap-4") }}
</nav>
</main>
  </div>
</div>
</body>
</html>

 