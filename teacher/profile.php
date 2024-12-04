<?php
$page = "Profile";
include_once "header.php";
include_once '../functions/teacher.php';
session_start();
$teacher = getTeacher($_SESSION['user_id']);

if(isset($_POST['submit'])){
    editTeacherProfile($_SESSION['user_id'], $_POST);
}
?>

    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><?= $teacher -> firstname?> <?= $teacher -> lastname?> - Profile</h1>
        </div>
        <form method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $teacher -> firstname?>" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $teacher -> lastname?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $teacher -> email?>" readonly disabled required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?= $teacher -> dob?>" required>

            <button type="submit" name="submit" class="add-btn">Edit Profile</button>
        </form>
    </div>
<?php
include_once 'footer.php';
