<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | TechBlog</title>
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
    .contact-header {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url("{{ asset('images/ContactUs.avif') }}") center/cover;
      color: white;
      text-align: center;
      padding: 100px 20px;
    }
    .contact-form {
      background-color: #e8d36aff;
      color: #282625ff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 40px;
    }
    .form-control:focus {
      border-color: #212529;
      box-shadow: none;
    }
    footer {
      background-color: #212529;
      color: #ccc;
      padding: 40px 0;
    }
    #sendMessageBtn {
      background-color: #212529;
      border: none;
    }
    #sendMessageBtn:hover {
      background-color: #315ed2ff;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    @include('Navbar')

  <!-- Header -->
  <section class="contact-header">
    <div class="container">
      <h1 class="fw-bold">Contact Us</h1>
      <p class="lead mt-2">We’d love to hear from you — let’s get in touch!</p>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="py-5 " style="background-color: #9CB6EA;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="contact-form">
            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="#" method="POST">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label fw-bold">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label for="subject" class="form-label fw-bold">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="What’s this about?">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label fw-bold">Message</label>
                <textarea id="message" name="message" rows="5" class="form-control" required placeholder="Type your message..."></textarea>
              </div>
              <div class="text-center">
                <button type="submit" id="sendMessageBtn" class="btn btn-dark px-4 py-2">Send Message</button>
              </div>
            </form>
          </div>
        </div>
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
