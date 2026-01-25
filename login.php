<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$rememberedUsername = $_COOKIE['remember_username'] ?? "";
$theme = $_COOKIE['user_theme'] ?? "light";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body.dark { background-color: #000; color: #fff; }
        body.warm { background-color: #f5deb3; }
        body.light { background-color: #f8f9fa; }
    </style>
</head>

<body class="<?= $theme ?>">

<div class="container mt-5">
    <div class="card p-4 col-md-6 mx-auto">
        <h3 class="text-center mb-3">Login</h3>

        <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endforeach; ?>

        <form method="POST" action="auth.php">
            <!-- <form method="POST" action="auth.php" autocomplete="off"> -->
        <div class="mb-3">
                  <label>Username</label>
                <input type="text" name="username" class="form-control"
                       value="<?= htmlspecialchars($rememberedUsername) ?>">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>

           <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

</body>
</html>
