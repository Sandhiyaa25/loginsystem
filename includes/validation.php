<?php

function validateUsername($username) {
    if (empty($username)) {
        return "Username is required";
    }
    if (strlen($username) < 3) {
        return "Username must be at least 3 characters";
    }
    return "";
}

function validateEmail($email) {
    if (empty($email)) {
        return "Email is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return "";
}

function validatePassword($password) {
    if (empty($password)) {
        return "Password is required";
    }
    if (strlen($password) < 6) {
        return "Password must be at least 6 characters";
    }
      if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least 1 uppercase letter";
    }

     if (!preg_match('/[0-9]/', $password)) {
        return "Password must contain at least 1 number";
    }

        if (!preg_match('/[!@#$%^&*]/', $password)) {
        return "Password must contain at least 1 special character";
    }
    return "";
}
