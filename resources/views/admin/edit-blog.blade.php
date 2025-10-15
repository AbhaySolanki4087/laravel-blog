<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Blog - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a href="{{ url('/admin-dashboard') }}" class="navbar-brand">← Back to Dashboard</a>
  </div>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4>Edit Blog</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" name="title" id="title" class="form-control" 
                       value="{{ old('title', $blog->title) }}" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Blog Category</label>
                <select class="form-select" name="category" required>
                  <option value="" disabled>Select Category</option>

                  @if($Category && $Category->count() > 0)
                    @foreach($Category as $Cat)
                      <option value="{{ $Cat->name }}" 
                        {{ $blog->category == $Cat->name ? 'selected' : '' }}>
                        {{ $Cat->name }}
                      </option>
                    @endforeach
                    <option value="Others" {{ $blog->category == 'Others' ? 'selected' : '' }}>Others</option>
                  @else
                    <option>None</option>
                  @endif
                </select>
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3 d-flex align-items-center">
                <div class="flex-grow-1">
                    <label for="image" class="form-label">Blog Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if($blog->image)
                    <div class="ms-3">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image" style="height:80px; width:auto; border-radius:5px;">
                    </div>
                @endif
            </div>


              <button type="submit" class="btn btn-primary">Update Blog</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
