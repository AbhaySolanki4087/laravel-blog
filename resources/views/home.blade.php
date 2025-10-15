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
<?php
    $user = request()->cookie('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Blog</title>
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
      background-color: #f8f9fa;
    }
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 120px 20px;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .blog-card img {
      height: 200px;
      object-fit: cover;
    }
    .footer { 
      background: #343a40;
      color: white;
      padding: 30px 0;
    }
    .footer a {
      color: #f8f9fa;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
    
</style>
</head>
<body>

  <!-- Navbar -->
   <section class="navbar-section">
      @include('Navbar')
   </section>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Welcome to My Blog</h1>
      <p class="lead">Sharing ideas, stories, and insights with the world.</p>
    </div>
  </section>

  <!-- Blog Content -->
  
    @include('BlogCard')

  <!-- Footer -->
    @include('Footer')

    <script>
    function login() {
      window.location.href = "../login";
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
