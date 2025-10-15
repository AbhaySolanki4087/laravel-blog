
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div>
        <a class="navbar-brand" href="/admin">Admin Panel</a>
      </div>
      <div>
        <div>
        <a href="home" class="btn btn-success">Home</a>
        <button class="btn btn-outline-light" onclick="logout()">Logout</button>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h2>Welcome, Admin 👋</h2>
    <p>Manage users, blog posts, and site settings here.</p>

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5>Manage Posts</h5>
            <p>Edit or delete existing posts.</p>
            <a href="admin-dashboard" class="btn btn-primary">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5>Manage Users</h5>
            <p>View and control user accounts.</p>
            <a href="#" class="btn btn-success">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5>Site Settings</h5>
            <p>Configure blog information and preferences.</p>
            <a href="#" class="btn btn-secondary">Go</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5> Manage Category</h5>
            <p>Add New Category to Enhance User Experience</p>
            <a href="ManageCategory" class="btn btn-warning">Go</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    function logout() {
      window.location.href = "../logout";
    }
  </script>
</body>
</html>
