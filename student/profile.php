<?php
$page = "Profile";
include_once "header.php";
include_once '../functions/student.php';
session_start();
$student = getStudent($_SESSION['user_id']);

if(isset($_POST['submit'])){
    editStudent($_SESSION['user_id'], $_POST);
}
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><?= $student -> firstname?> <?= $student -> lastname?></h1>
        </div>
        <form method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $student -> firstname?>" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $student -> lastname?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $student -> email?>" required readonly disabled>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?= $student -> dob?>" required>

            <button type="submit" name="submit" class="add-btn">Edit Profile</button>
        </form>


    </div>
<?php
include_once 'footer.php';
