
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
  
<form method="POST" action="/admin/category" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control" id="category_name"  name= "name" placeholder="Enter Category Name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload an Image</label>
    <input type="file" name="image" files=true class="form-control-file" id="exampleFormControlFile1">
  </div>
  
    
   <button type="submit" class="btn btn-primary">Create</button>
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
  <!-- <a href="/category/{{$category->id}}/edit"><span class="badge badge-primary badge-pill">Edit</span><a>
    <span class="badge badge-primary badge-pill">Delete</span>-->
<div class="btn-group" style="height: 38px;">
   
      <button  onclick="location.href='/admin/category/{{$category->id}}/edit'" class="btn btn-primary">Edit</button>
         
    <form action="/admin/category/{{ $category->id }}" method= "POST" >
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button  class="btn btn-danger">Delete</button>
          </form>
</div>
     <!--
        <a href="/category/{{$category->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>
        <form action="/category/{{ $category->id }}" method= "POST" >
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button  class="btn btn-danger">Delete</button>
          </form>
      
      -->
  </li>
    @endforeach
</ul>
</main>
  </div>
</div>
</body>
</html>
   
