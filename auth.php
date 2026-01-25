<?php
session_start();
require "includes/validation.php";
require "users.php";


$email    = $_POST['email'] ?? "";
$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";
$remember = isset($_POST['remember']);

$errors = [];


if ($msg = validateEmail($email)) $errors[] = $msg;
if ($msg = validateUsername($username)) $errors[] = $msg;
if ($msg = validatePassword($password)) $errors[] = $msg;

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit;
}


$authenticatedUser = null;
$userFoundByEmail = null;

foreach ($users as $user) {

    // First check email
    if ($email === $user['email']) {
        $userFoundByEmail = $user;

        // Now check username
        if ($username !== $user['username']) {
            $_SESSION['errors'] = ["Username is incorrect"];
            header("Location: login.php");
            exit;
        }

        // Now check password
        if ($password !== $user['password']) {
            $_SESSION['errors'] = ["Password is incorrect"];
            header("Location: login.php");
            exit;
        }

        // If everything correct
        $authenticatedUser = $user;
        break;
    }
}

if (!$userFoundByEmail) {
    $_SESSION['errors'] = ["Email is not registered"];
    header("Location: login.php");
    exit;
}

if ($authenticatedUser) {

    $_SESSION['username'] = $authenticatedUser['username'];
    $_SESSION['email'] = $authenticatedUser['email'];
    $_SESSION['theme'] = $authenticatedUser['theme'];

    if ($remember) {
        setcookie("remember_username", $authenticatedUser['username'], time() + 60);
        setcookie("user_theme", $authenticatedUser['theme'], time() + 60);
    }
else {
        setcookie("remember_username", "", time() - 3600);
    

    }
    header("Location: dashboard.php");
    exit;
}


