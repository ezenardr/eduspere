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
    <div class="form-section">
        <h1>Create Account</h1>
        <?php
        include_once 'functions/auth.php';
        $password_confirmation_error = '';
        $formData = [
            "firstname" => '',
            "lastname" => '',
            "email" => '',
            "password" => '',
            "password_confirmation" => '',
            "dob" => '',
            "gender" => '',
            "phone_number" => '',
        ];
        if (isset($_POST['submit'])) {
            if ($_POST['password'] != $_POST['password_confirmation']) {
                $password_confirmation_error = "Passwords do not match!";
                $formData = [
                    "firstname" => $_POST['firstname'],
                    "lastname" => $_POST['lastname'],
                    "email" => $_POST['email'],
                    "password" => $_POST['password'],
                    "password_confirmation" => $_POST['password_confirmation'],
                    "dob" => $_POST['dob'],
                    "gender" => $_POST['gender'],
                    "phone_number" => $_POST['phone_number'],
                ];
            }else{
                register($_POST);
            }
        }

        ?>
        <form method="POST">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your firstname" value="<?= $formData["firstname"] ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your lastname" value="<?= $formData["lastname"] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?= $formData["email"] ?>" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="<?= $formData["password"] ?>" id="password" name="password" placeholder="Enter your password" required>
                <span class="password-error"><?= $password_confirmation_error ?></span>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" value="<?= $formData["password_confirmation"] ?>" id="password_confirmation" name="password_confirmation"
                       placeholder="Confirm your password" required>
                <span class="password-error"><?= $password_confirmation_error ?></span>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" value="<?= $formData["dob"] ?>" id="dob" name="dob"
                       placeholder="Date of birth" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" value="<?= $formData["phone_number"] ?>" id="phone_number" name="phone_number"
                       placeholder="Phone number" required>
            </div>
            <div class="form-group">
                <label for="gender">
                    <select name="gender" required>
                        <option value="">Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label>

            </div>
            <button class="cta" type="submit" name="submit">Register</button>
            <span class="link">Already have an account ? <a href="login.php">Login &rarr;</a></span>
        </form>
    </div>
</div>
</body>
</html>
