
 @extends('admin.test.header')
<body>
  @extends('admin.menu-1')

<div class="container-fluid">
  <div class="row">
    @include('admin.test.menu')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        
      </div>
  
<form method="POST" action="/admin/category/{{$category->id}}" enctype="multipart/form-data">
  {{method_field('PUT')}}
  {{ csrf_field() }}
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control" id="category_name"  name= "name" placeholder="Enter Category Name" value= "{{$category->name}}">
  </div>
@if(  file_exists( public_path() . '/img/categories/' . $category->title . '.jpeg') )
<div class="img">
  <h6>Category Image</h6>
<img src="{{ asset('img/categories/'. $category->title .'.jpeg') }}" alt="{{$category->name}}" class="img-thumbnail" style="height: 200px;">
</div>
 @endif
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload an Image</label><small> (If there is an image already, it will be overridden) </small>
    <input type="file" name="image" files=true class="form-control-file" id="exampleFormControlFile1">
  </div>
 
    
   <button type="submit" class="btn btn-primary">Edit Category</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<ul class="list-group">
   @foreach ($categories as $category)
  <li class="list-group-item d-flex justify-content-between align-items-center">
   {{$category->name}}
   <div class="btn-group" style="height: 38px;">
   
      <button  onclick="location.href='/admin/category/{{$category->id}}/edit'" class="btn btn-primary">Edit</button>
         
    <form action="/category/{{ $category->id }}" method= "POST" >
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button  class="btn btn-danger">Delete</button>
          </form>
</div>
  </li>
    @endforeach
</ul>
</main>
  </div>
</div>
</body>
</html>
   
