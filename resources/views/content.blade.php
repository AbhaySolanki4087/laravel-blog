<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>title  | TechBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: "Poppins", sans-serif; }
    .post-header {
      background-color: #212529;
      color: white;
      padding: 80px 20px 40px;
      text-align: center;
    }
    .post-header h1 {
      font-weight: 700;
    }
    .post-image img {
      width: 100%;
      max-height: 480px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 30px;
    }
    .post-content {
      line-height: 1.8;
      font-size: 1.05rem;
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
  <section class="post-header">
    <div class="container">
      <h1>title</h1>
      <p class="text-muted mt-2">created at</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5">
    <div class="container">
      <div class="post-image">
        <img src="{{ asset('images/lab.avif') }}" alt="title">
      </div>
      <div class="post-content">
        content
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
