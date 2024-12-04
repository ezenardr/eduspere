<?php

$page = "My Classes";
include_once 'header.php';
include_once '../functions/class.php';
include_once '../functions/student.php';
$classes = getClasses();
session_start();

if(isset($_POST['submit'])){
    addStudentToClass($_SESSION['user_id'], $_POST['class_id']);
}
if(isset($_POST['remove'])){
    removeStudentFromClass($_SESSION['user_id'], $_POST['class_id']);
}
?>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><a href="my-classes.php" style="margin-right: 20px">&larr;</a>Add Classes</h1>
        </div>

        <!-- Stats Cards -->
        <div  class="cards">
            <?php foreach ($classes as $class): ?>
                <form method="POST" class="card">
                    <h3><?= $class -> name ?></h3>
                    <label>
                        <input type="text" hidden="hidden" name="class_id" value="<?= $class -> class_id?>"  >
                    </label>
                    <?php
                    $test = isStudentInClass($_SESSION['user_id'], $class->class_id);
                    if($test == 1){
                    ?>
                    <button class="button" type="submit" name="remove">Remove</button>
                        <?php } else { ?>
                        <button class="button" type="submit" name="submit">Add</button>
                        <?php }?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
<?php
include_once 'footer.php';
