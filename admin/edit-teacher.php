<?php
$page = "Teachers";
include_once "header.php";
include_once 'header.php';
include "../functions/teacher.php";

$teacher = getTeacher($_GET['id']);

if(isset($_POST['submit'])){
    editTeacher($teacher -> user_id, $_POST);
}
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><a href="teachers.php" style="margin-right: 20px">&larr;</a><?= $teacher -> firstname ?> <?= $teacher -> lastname ?></h1>
        </div>
        <form method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $teacher -> firstname ?>" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $teacher -> lastname ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $teacher -> email ?>" readonly disabled required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?= $teacher -> dob ?>" required>

            <button type="submit" name="submit" class="add-btn">Submit</button>
        </form>


    </div>
<?php
include_once 'footer.php';
