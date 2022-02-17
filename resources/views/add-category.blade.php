<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
       
    </head>
   <body>
<div class="container">
  <h2>Add Category</h2>
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
  <form action="{{ url('store-category') }}" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="category_title">Category Title:</label>
      <input  type="text" class="form-control" id="category_title" placeholder="Enter Category Title" name="category_title" required>
    </div>
    <div class="form-group">
      <label for="category_description">Category Description:</label>
    <textarea class="form-control" name="category_description" id="category_description"></textarea>
    </div>
    <div class="form-group">
      <label for="category_price">Price:</label>
      <input  type="number" class="form-control" id="category_price" placeholder="Enter Category Price" name="category_price" required>
    </div>
    <div class="form-group">
      <label for="parent_category">Parent Category:</label> 
   <select name="parent_category" id="parent_category" class="form-control">
  <option selected>Please Select Parent Category</option>
  @foreach($categories as $res)
<option value="{{$res->id}}">{{$res->title}}</option>
  @endforeach
</select>
    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
