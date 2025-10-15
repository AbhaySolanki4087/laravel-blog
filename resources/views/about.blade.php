<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | TechBlog</title>
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

    body {
      font-family: "Poppins", sans-serif;
      line-height: 1.7;
    }

    .hero-section {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('Images/Tech.avif') center/cover;
      color: white;
      text-align: center;
      padding: 120px 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .content-section {
      padding: 60px 0;
    }

    .author-section img {
      width: 160px;
      height: 160px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    footer {
      background-color: #212529;
      color: #ccc;
      padding: 40px 0;
    }

    footer a {
      color: #ccc;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  @include('Navbar')
  <!-- End Navbar -->

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <h1>About TechBlog</h1>
      <p class="lead mt-3">Exploring technology, innovation, and the digital future — one post at a time.</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="content-section">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-md-6">
          <img src="{{ asset('Images/lab.avif') }}"
               alt="TechBlog" class="img-fluid rounded-3 shadow-sm">
        </div>
        <div class="col-md-6">
          <h2 class="fw-bold mb-3">Who We Are</h2>
          <p>
            Welcome to <strong>TechBlog</strong> — your go-to space for all things technology.
            We share insights, tutorials, and opinions on the latest trends in software, hardware, AI, web development, and more.
          </p>
          <p>
            Our goal is to simplify complex topics and make technology accessible to everyone —
            from passionate beginners to experienced developers.
          </p>
        </div>
      </div>

      <!-- Author / Team Section -->
      <div class="text-center author-section mt-5">
        <img src="{{ asset('Images/admin.jpg') }}" alt="Author">
        <h4 class="fw-bold">About the Author</h4>
        <p class="text-muted mb-3">Hey! I'm <strong>Abhay</strong>, a passionate web developer and tech enthusiast.</p>
        <p class="px-5">
          I love building modern web apps, exploring new technologies, and sharing my experiences through this blog.
          Whether you're a coder, a tech lover, or just curious — I hope you find something inspiring here.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>© 2025 TechBlog — All Rights Reserved.</p>
      <div class="mt-2">
        <a href="https://github.com/" target="_blank">GitHub</a> ·
        <a href="#">LinkedIn</a> ·
        <a href="contact.html">Contact</a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
