

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Enter Category</title>
</head>
  @extends("admin.layouts.dashboard")
  @section("content")
  
<div class="col-md-8">
    <h2>Enter Category</h2>
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="categoryName">Category Name:</label>
        <input type="text" class="form-control" id="categoryName" name="category_name" placeholder="Enter category name" required style="width:800px">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @endsection

