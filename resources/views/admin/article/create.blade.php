
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
  
<form method="POST" action="/admin/article" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Article Name</label>
    <input type="text" class="form-control" id="article_name"  name = "name" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name= "category_id" id="exampleFormControlSelect1">
      <option value = 0>Select Category</option>
      @foreach ($categories as $category)
      <option value = "{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload an Image</label>
    <input type="file" name="image" files=true class="form-control-file" id="exampleFormControlFile1">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Enter an Article</label>
    <textarea class="form-control" id="article_edit" name= "description" rows="6"></textarea>
  </div>

   <div class="form-check">
    <input type="checkbox" class="form-check-input" name="is_important" id="exampleCheck1" value="1">
    <label class="form-check-label" for="exampleCheck1">Important News</label>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="editor_choice" id="exampleCheck2" value="1">
    <label class="form-check-label" for="exampleCheck2">Editor’s Choice</label>
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


</main>
  </div>
</div>
</body>
</html>
  
 