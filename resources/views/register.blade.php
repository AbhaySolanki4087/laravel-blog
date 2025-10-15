<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration | MyBlog</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- Include CSS using Vite --}}
    @vite(['resources/css/app.css','resources/css/home.css'])

  <style>
    .body {
      background: linear-gradient(to right, #1f4037, #99f2c8);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 450px;
    }
  </style>
</head>
<body>
    @include('Navbar')
<div class="body">
  <div class="register-box">
    <h3 class="text-center mb-4">Create Your Account</h3>
    <form action="/registration" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-person"></i> Full Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
        <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label"><i class="bi bi-lock"></i> Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>

      <button class="btn btn-success w-100" type="submit">Register</button>

      <p class="text-center mt-3 text-muted">
        Already have an account? <a href="login" class="text-decoration-none">Login here</a>
      </p>
    </form>
  </div>
</div>

  <!-- footer -->
  @include('Footer')

  <script>
    // function registerUser(event) {
    //   event.preventDefault();

    //   const name = document.getElementById('name').value.trim();
    //   const email = document.getElementById('email').value.trim();
    //   const password = document.getElementById('password').value;
    //   const confirmPassword = document.getElementById('confirmPassword').value;

    //   if (password !== confirmPassword) {
    //     alert('Passwords do not match!');
    //     return;
    //   }

    //   // Simulate registration success
    //   alert(`Welcome ${name}! Your account has been created successfully.`);
    //   window.location.href = "login"; // Redirect to login
    // }
  </script>

</body>
</html>
