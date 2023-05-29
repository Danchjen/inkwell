<?php
session_start();
include('includes/header.php') ?>
<?php if (isset($_SESSION['message'])) { ?>
<div class="pos-abs">
    <div class="alert alert-warning alert-dismissible fade show pos-abs" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<?php
    unset($_SESSION['message']);
} ?>
<section class="hero">
    <div class="hero__main-content">
        <h1 class="hero__title"><span class="hero__title-add">Welcome to</span>Future of Accounting</h1>
        <p class="hero__desc">This Web Application will allow you to take full control of your products, whether
            it is pencil store or chocolate Factory</p>
        <div class="btns">
            <a href="login.php" class="hero__login-btn hero__btn">Login</a>
            <a href="register.php" class="hero__register-btn hero__btn">Register</a>
        </div>
    </div>
</section>
<?php include('includes/footer.php') ?>