<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
    {{-- Include CSS using Vite --}}
    @vite(['resources/css/app.css','resources/css/home.css'])
    
  <style>
    body {
      background: linear-gradient(to right, #1f4037, #99f2c8);
      height: 100vh;
    }
    .login-box {
      max-width: 400px;
      margin: 100px auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }.footer {
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
    @include('Navbar')

  <div class="login-box">
    <h3 class="text-center mb-4">Login to MyBlog</h3>

    <form action="UserLogin" method="post">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100" type="submit">Login</button>
      <p class="text-center mt-3 text-muted">Login as <strong>Admin</strong> or <strong>User</strong></p>
      <p class="text-center mt-3 text-muted">
        Don't have account? 
        <a href="register" class="text-decoration-none">Register here</a>
    </p>
    </form>

  </div>

  <!-- footer -->
  @include('Footer')   

  <script>
    // function handleLogin(event) {
    //   event.preventDefault();
    //   const email = document.getElementById("email").value;
    //   const password = document.getElementById("password").value;

    //   // Simple Frontend Demo Logic (replace with backend validation)
    //   if (email === "admin@blog.com" && password === "admin123") {
    //     window.location.href = "admin";
    //   } else if (email === "user@blog.com" && password === "user123") {
    //     window.location.href = "user";
    //   } else {
    //     alert("Invalid credentials!");
    //   }
    // }
  </script>

</body>
</html>
