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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .section-separator {
    position: relative;
    text-align: center;
    margin: 40px;
  }
  .section-separator::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #747272ff;
    z-index: 1;
  }
  .section-separator span {
    background-color: #fff;
    padding: 0 15px;
    position: relative;
    z-index: 2;
    font-weight: 600;
    color: green;
    font-size: 18px;
    letter-spacing: 0.5px;
  }
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
      <button class="btn btn-outline-light" onclick="logout()">Logout</button>
    </div>
  </nav>

  <div class="container mt-5"> 
    <h2>Welcome, Admin 👋</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}" class="text-black">Admin</a></li>
            <li class="breadcrumb-item active" ><a href="{{ url('ManageCategory') }}" class="text-black">ManageCategory</a></li>
        </ol>
    </nav>

    <!-- Separator -->
    <div class="section-separator">
    <span>Add New Category</span>
    </div>

    <!-- Horizontal Add Category Form -->
    <div class="col-md-4 mx-auto mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
            <form action="{{ url('addCategory') }}" method="POST" class="d-flex align-items-center justify-content-center">
                @csrf
                <input type="text" name="category_name" class="form-control me-2" placeholder="Enter Category Name" required style="max-width: 300px;">
                <button type="submit" class="btn btn-warning">Add</button>
            </form>
            </div>
        </div>
    </div>

    <!-- Separator -->
    <div class="section-separator">
        <span>Show All Category</span>
    </div>

<!--- Show All category here With Their link--->
    <div class="row mt-4">
    @isset($categories)
        @foreach ($categories as $category)

      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5>{{ $category->name }}</h5>
            <p>View and control user accounts.</p>
            <a href="#" class="btn btn-success">Go</a>
          </div>
        </div>
      </div> 
        @endforeach
    @endisset
    @empty($categories)
      <div class="col-md-4  mb-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5>Site Settings</h5>
            <p>Configure blog information and preferences.</p>
            <a href="#" class="btn btn-secondary">Go</a>
          </div>
        </div>
      </div>
     @endempty 

    </div>
  </div>

  <script>
    function logout() {
      window.location.href = "../logout";
    }
  </script>
</body>
</html>
