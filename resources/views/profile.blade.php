<?php
// Check if cookie exists
if (!isset($_COOKIE['user'])) {
    header("Location: /login");
    exit();
}

// Decode cookie
$user = json_decode($_COOKIE['user'], true);
$userName = $user['name'] ?? 'User';
$userEmail = $user['email'] ?? '';
$userRole = $user['role'] ?? 'user';

// Example stats (you can fetch from DB if you want)
if ($userRole === 'admin') {
    $stats = [
        'blogs' => 12, // total blogs in DB
        'users' => 50, // total users in DB
    ];
} else {
    $stats = [
        'liked' => 5,   // blogs liked by this user
        'posted' => 3,  // blogs posted by this user
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($userName) ?> - Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background-color: #f8f9fa; }
    .card img { border-radius: 50%; }
</style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4><?= ucfirst($userRole) ?> Profile</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="/images/default-user.png" width="120" height="120" alt="Profile">
                        <div class="ms-4">
                            <h5><?= htmlspecialchars($userName) ?></h5>
                            <p><strong>Email:</strong> <?= htmlspecialchars($userEmail) ?></p>
                            <p><strong>Role:</strong> <?= ucfirst($userRole) ?></p>
                        </div>
                    </div>

                    <div class="row text-center mb-3">
                        <?php if ($userRole === 'admin'): ?>
                            <div class="col">
                                <h6>Total Blogs</h6>
                                <p><?= $stats['blogs'] ?></p>
                            </div>
                            <div class="col">
                                <h6>Total Users</h6>
                                <p><?= $stats['users'] ?></p>
                            </div>
                        <?php else: ?>
                            <div class="col">
                                <h6>Blogs Liked</h6>
                                <p><?= $stats['liked'] ?></p>
                            </div>
                            <div class="col">
                                <h6>Blogs Posted</h6>
                                <p><?= $stats['posted'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <a href="/edit-profile.php" class="btn btn-primary w-100">Edit Profile</a>
                    <a href="/logout.php" class="btn btn-danger w-100 mt-2">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
