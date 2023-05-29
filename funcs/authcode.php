<?php
session_start();
include('../config/dbcon.php');
include('../funcs/myfunctions.php');

if (isset($_POST['register_btn'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
    $userpassword = mysqli_real_escape_string($con, $_POST['userpassword']);

    $check_email_query = "SELECT useremail FROM users WHERE useremail='$useremail'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = 'Email already registered';
        header('Location: ../register.php');
    } else {
        $insert_query = "INSERT INTO users (username, useremail, userpassword) VALUES ('$username', '$useremail', '$userpassword')";
        $insert_query_run = mysqli_query($con, $insert_query);
        if ($insert_query_run) {
            $_SESSION['message'] = 'Registered successfully';
            header('Location: ../login.php');
        } else {
            $_SESSION['message'] = 'Something went wrong';
            header('Location: ../register.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
    $userpassword = mysqli_real_escape_string($con, $_POST['userpassword']);

    $login_query = "SELECT * FROM users WHERE useremail='$useremail' AND userpassword='$userpassword' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['username'];
        $useremail = $userdata['useremail'];
        $usertype = $userdata['usertype'];
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail,
        ];

        $_SESSION['user_type'] = $usertype;

        if ($usertype === 'A') {
            redirect("../admin/index.php", "Welcome to dashboard");
        } else {
            redirect("../index.php", "Logged in successfully");
        }
    } else {
        redirect("../login.php", "Invalid email or password");
    }
}
