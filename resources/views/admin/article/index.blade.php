
 @include('admin.header')
<body>
   @include('admin.menu-1')

<div class="container-fluid">
  <div class="row">
    @include('admin.menu')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
        
      </div>
  
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">User</th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
       <th>

        {{$article->created_at}}</th>
      <th ><a href="/admin/article/{{$article->id}}/edit">{{$article->name}}</a></th>
      <td>{{(count($article->category))? $article->category->name: "N/A"}}</td>
      <td>{{ $article->user->name}}</td>
      <td><form action="/admin/article/{{ $article->id }}" method= "POST" >
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button  class="btn btn-danger btn-sm">Delete</button>
          </form></span>
</td>
     
    </tr>
    @endforeach
  </tbody>

  
</table>
<nav aria-label="Page navigation example">

{{ $articles->links( "pagination::bootstrap-4") }}
</nav>

</main>
  </div>
</div>
</body>
</html>
  
 