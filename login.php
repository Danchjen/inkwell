<?php session_start();
include('funcs/myfunctions.php');
if (isset($_SESSION['auth'])) {
    redirect("index.php", "You are already logged in");
}
include('includes/header.php'); ?>
<section class="register-section">
    <h1>Login</h1>
    <form class="register__form-container" action="funcs/authcode.php" method="POST">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['message']);
        } ?>
        <div class="mb-3">
            <label for="useremail" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="useremail" required />
        </div>
        <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="userpassword" required />
        </div>
        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
    </form>
</section>
<?php include('includes/footer.php') ?>