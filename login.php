<?php
$version = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="assets/css/global.css?v=<?= $version ?>"/>
    <link rel="stylesheet" href="assets/css/auth.css?v=<?= $version ?>">
</head>
<body>
<div class="container">
    <div class="image-section">
        <img
                alt="Auth BG"
                src="assets/img/auth.avif"
        />
    </div>
    <div class="form-section-login">
        <h1>Login To Your Account</h1>
        <?php
        include_once 'functions/auth.php';

        $email_error = '';
        $pass_error = "";
        $email = '';
        if (isset($_POST['submit'])) {
            $data = login($_POST);
            $email = $_POST['email'];
            if ($data == "Incorrect password") {
                $pass_error = "Incorrect password";
            }
            if($data == 'User not Found'){
                $email_error = "User not Found";
            }
        }
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?= $email ?>" required>
                <span class="password-error"><?= $email_error ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span class="password-error"><?= $pass_error ?></span>
            </div>
            <button class="cta" type="submit" name="submit">Register</button>
            <span class="link">Don't have an account ? <a href="register.php">Register &rarr;</a></span>
        </form>
    </div>
</div>
</body>
</html>
