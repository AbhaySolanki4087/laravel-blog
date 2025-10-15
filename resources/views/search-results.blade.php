<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Blog - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Include the navbar -->
    @include('navbar')

  <h2 class="mt-3 mx-5">Blog Details</h2>
  <div class="container-fluid mt-3 d-flex ">
    <div class="col-lg-8 ms-5">

        <div class="container mt-4">
            <p>Search Results for: <em>{{ $search }}</em></p>
            <!-- Show empty input message here -->
            @if(isset($message))
                <p class="text-danger">{{ $message }}</p>
            @endif
            <hr>

            @if($blogs->count() > 0)
                @foreach($blogs as $blog)
                    
                    <div class="card shadow-sm mb-4">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image" height="400">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="card-title mb-0">{{ $blog->title }}</h3>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="mb-0"><strong>Likes:</strong> <span class="like-count">{{ $blog->like }}</span></p>
                                    <button class="btn btn-warning btn-sm like-btn" onclick="toggleLike(this)">❤️ Like</button>
                                </div>
                            </div>
                            <p class="card-text">{{$blog->content }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No results found.</p>
            @endif
        </div>
    </div>


    <!-- Sidebar -->
        <div class="col-lg-3 ms-5">
          <!-- Search -->
          <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Search</h5>
              <form action="/search" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-dark">Go</button>
                  </div>
              </form>
            </div>
          </div>

          <!-- Categories -->
          <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <ul class="list-unstyled mb-0">
                <li><a href="#" class="text-decoration-none">Travel</a></li>
                <li><a href="#" class="text-decoration-none">Technology</a></li>
                <li><a href="#" class="text-decoration-none">Lifestyle</a></li>
                <li><a href="#" class="text-decoration-none">Health</a></li>
              </ul>
            </div>
          </div>

          <!-- Tags -->
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Tags</h5>
              <div>
                <span class="badge bg-secondary">Design</span>
                <span class="badge bg-secondary">Travel</span>
                <span class="badge bg-secondary">Startup</span>
                <span class="badge bg-secondary">Tech</span>
                <span class="badge bg-secondary">Health</span>
              </div>
            </div>
          </div>
        </div>
  </div>



  <script>
    function toggleLike(btn) {
      const countEl = document.querySelector(".like-count");
      let count = parseInt(countEl.textContent);
      const liked = btn.classList.toggle("liked");
      countEl.textContent = liked ? count + 1 : count - 1;
      btn.textContent = liked ? "💔 Unlike" : "❤️ Like";
    }
  </script>

</body>
</html>
