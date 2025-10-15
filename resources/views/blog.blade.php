<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | TechBlog</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <style>
     /* Navbar Styles for login/register Start */
    .auth-links a {
      color: black;
      background-color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .auth-links a:hover {
      background-color: #486582ff;
      color: white;
    }
    /* Navbar Styles for login/register End */
   
    body { font-family: "Poppins", sans-serif; }
    .blog-header {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url("{{ asset('images/thumbnail.avif') }}") center/cover;
      color: white;
      padding: 100px 20px;
      text-align: center;
    }
    .card img {
      height: 220px;
      object-fit: cover;
    }
    footer {
      background-color: #212529;
      color: #ccc;
      padding: 40px 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    @include('Navbar')

  <!-- Header -->
  <section class="blog-header">
    <div class="container">
      <h1 class="fw-bold">Our Latest Articles</h1>
      <p class="lead">Stay updated with the latest tech insights and tutorials.</p>
    </div>
  </section>

  <!-- Blog List -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <!-- Example Blog Card -->
        @isset($blogs)
            @foreach ($blogs as $blog)
            <div class="col-md-4">
              <div class="card shadow-sm border-0">
                <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="#">
                <div class="card-body">
                  <h5 class="card-title fw-bold">{{ $blog->title }}</h5>
                  <p class="text-muted small mb-2">{{ $blog->created_at->format('F j, Y') }}</p>
                  <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                  <a href="{{ route('blog.read', $blog->id) }}" class="btn btn-dark btn-sm">Read More</a>
                </div>
              </div>
            </div>
            @endforeach 
        @endisset
        @empty($blogs)
          <div class="col-md-4">
          <div class="card shadow-sm border-0">
            <img src="#" class="card-img-top" alt="#">
            <div class="card-body">
              <h5 class="card-title fw-bold">title</h5>
              <p class="text-muted small mb-2">created at</p>
              <p class="card-text">content</p>
              <a href="#" class="btn btn-dark btn-sm">Read More</a>
            </div>
          </div>
        </div>
        @endempty
        <!-- Example Blog Card End -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>© 2025 TechBlog — All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
