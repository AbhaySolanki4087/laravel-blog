<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Blog - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a href="admin-dashboard" class="navbar-brand">← Back to Dashboard</a>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="mb-3">Add New Blog</h3>
<!--- form start --->
  <form action="/newBlog" method="POST" enctype="multipart/form-data" id="addBlogForm">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Blog Title</label>
      <input type="text" id="title" name="title" class="form-control" placeholder="Enter blog title" required>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Blog category</label>
      <select class="form-select" name="category" required>
        <option value="" disabled selected>Select Category</option>

        @if($Category)
          @foreach($Category as $Cat)
            <option>{{$Cat->name}}</option>
            @endforeach  
            <option>Others</option>
        @else
          <option>None</option>
        @endif

      </select>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea id="content" name="content" class="form-control" rows="6" placeholder="Enter blog content" required></textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" id="image" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Blog</button>
  </form>
</div>

<!-- <script>
// document.getElementById('addBlogForm').addEventListener('submit', function(e) {
//   e.preventDefault();
//   alert("Blog added successfully! (Demo only)");
//   window.location.href = "admin-dashboard.html";
// });
</script> -->

</body>
</html>
