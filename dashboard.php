<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$theme = $_SESSION['theme'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body.dark { background-color: #000; color: #fff; }
        body.warm { background-color: #f5deb3; }
        body.light { background-color: #f8f9fa; }
    </style>
</head>

<body class="<?= $theme ?>">

<div class="container mt-5">
    <div class="card p-4">
        <h3>Welcome, <?= $_SESSION['username'] ?></h3>
        <p>Email: <?= $_SESSION['email'] ?></p>
        <p>Theme: <?= $_SESSION['theme'] ?></p>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

</body>
</html>
