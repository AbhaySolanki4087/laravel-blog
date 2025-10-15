@if (session('success'))
    <script>
      setTimeout(() => {
        // Clear the success message after displaying it for a short duration
        window.history.replaceState({}, document.title, window.location.pathname);
        alert("{{ session('success') }}");
        // also you delete the alert
      }, 500);
    </script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Blog Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: bold; }
    .like-btn.liked { color: red; }
    .table img { border-radius: 5px; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <div>
        <a class="navbar-brand" href="/admin">Admin Panel</a>
      </div>
      <div>
        <a href="home" class="btn btn-success">Home</a>
        <a href="add-blog" class="btn btn-success">+ Add New Blog</a>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h3 class="mb-3">Manage Blogs</h3>
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Likes</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="blogTable">
@isset($blogs)
        @foreach ($blogs as $blog)
        <tr>
          <td>{{ $blog->id }}</td>
          <td>{{ $blog->title }}</td>
          <td>{{ $blog->category }}</td>
          <td><span class="like-count">{{ $blog->likes }}</span></td>
          <td><img src="{{ asset('storage/' . $blog->image) }}" width="80"></td>
          <td>
            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">Delete</button>
            </form>
            <a href="{{ route('blog.read', $blog->id) }}" class="btn btn-sm btn-secondary">View</a>
          </td>
        </tr>
        @endforeach
@endisset        
      </tbody>
    </table>
  </div>

  <script>
    function toggleLike(btn) {
      const countEl = btn.closest("tr").querySelector(".like-count");
      let count = parseInt(countEl.textContent);
      const isLiked = btn.classList.toggle("liked");
      if (isLiked) {
        countEl.textContent = count + 1;
        btn.textContent = "💔 Unlike";
      } else {
        countEl.textContent = count - 1;
        btn.textContent = "❤️ Like";
      }
    }
  </script>
</body>
</html>
