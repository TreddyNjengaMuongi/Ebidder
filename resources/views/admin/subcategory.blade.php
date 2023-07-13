

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Enter Subcategory</title>
</head>
@extends("admin.layouts.dashboard")
@section("content")
  <div class="container">
    <h2>Enter Subcategory</h2>
    <form method="POST" action="{{ route('subcategory.store')}}">
        @csrf
      <div class="form-group">
        <label for="subcategoryName">Subcategory Name:</label>
        <input type="text" class="form-control" id="subcategoryName" placeholder="Enter subcategory name" required style="width:800px" name="subcategory_name">
      </div>
      <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" required name = "category" style="width:800px">
          <option value="" select disabled>Select category</option>
          @foreach($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  @endsection

  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

