<?php
include('../funcs/myfunctions.php');
if (isset($_SESSION['auth'])) {
    if ($_SESSION['user_type'] !== 'A') {
        redirect("../index.php", "You are not admin");
    }
} else {
    redirect("../login.php", "Login to continue");
}
