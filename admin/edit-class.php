<?php
$page = "Classes";
include_once "header.php";
include_once '../functions/class.php';
include_once '../functions/teacher.php';
$teachers = getTeachers();
$class = getClass($_GET['id']);

if(isset($_POST['submit'])){
    editClass($_POST, $class -> class_id);
}
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><a href="classes.php" style="margin-right: 20px">&larr;</a><?= $class -> name?></h1>
        </div>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $class -> name?>" required>

            <label for="coefficient">Coefficient:</label>
            <input type="text" id="coefficient" value="<?= $class -> coefficient?>" name="coefficient" required>

            <label for="teacher_id">Teacher:</label>
            <select id="teacher_id" name="teacher_id" required>
                <option value="">Select Teacher</option>
                <?php foreach ($teachers as $teacher) : ?>
                    <option value="<?= $teacher['user_id']?>"><?= $teacher['firstname']?> <?= $teacher['lastname']?></option>
                <?php endforeach; ?>
            </select>

            <label for="schedule">Schedule:</label>
            <input type="text" id="schedule" value="<?= $class -> schedule?>" name="schedule" required>

            <button type="submit" name="submit" class="add-btn">Edit Class</button>
        </form>


    </div>
<?php
include_once 'footer.php';
