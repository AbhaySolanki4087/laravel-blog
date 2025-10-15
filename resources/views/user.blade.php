<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard | MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">MyBlog User</a>
        <li class="nav-item"><i class="fa-solid fa-user-circle fa-2x color-primary"></i></li>
      <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
    </div>
  </nav>

  <div class="container my-5">
    <h2>Welcome Back, User 👋</h2>
    <p>Here are your recent activities and posts.</p>

    <div class="mt-4">
      <a href="my-posts" class="btn btn-primary me-2">My Posts</a>
      <a href="profile" class="btn btn-outline-secondary">My Profile</a>
    </div>
  </div>

  <script>
    function logout() {
      window.location.href = "../";
    }
  </script>
</body>
</html>
