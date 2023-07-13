

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Product Entry Form</title>
</head>

<body>
  @extends('vendors.layouts.vendorapp')
  @section('content')
  <div class="container">
    <h2>Enter Product</h2>
    <form method="POST" action="{{ url('vendor/addproducts/')}}" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" class="form-control" id="productName" placeholder="Enter product name" required name = "product_name" style = "800px">
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" placeholder="Enter product description" rows="3" required name = "product_description"></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter product price" required name = "price">
      </div>
      <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" name = "subcategory" style="width:800px">
          <option value="" select disabled>Select category</option>
          @foreach($categories as $category)
          <option value="{{ $category->subcategory_id }}">{{ $category->category_name }} {{__(':')}} {{ $category->subcategory_name }}</option>
          @endforeach
        </select>
      </div>
  
      <div class="form-group">
        <label for="imageURL">Image</label>
        <input type="file" class="form-control" id="imageURL" placeholder="Enter image URL" required name = "image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  @endsection

 


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


