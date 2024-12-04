<?php
$page = "My Classes";
include_once 'header.php';
include_once '../functions/student.php';
include_once '../functions/class.php';
include_once '../functions/teacher.php';
session_start();
$classes = getStudentClassesID($_SESSION['user_id']);
?>
    <div class="main-content">
        <div class="top-bar">
            <h1>My Classes</h1>
            <a href="add-class.php" class="add-btn">Add or Remove Classes</a>
        </div>
        <div class="cards">
            <?php foreach ($classes as $classID) : ?>
                <?php
                $class = getClass($classID->class_id);
                $teacher = getTeacher($class->teacher_id);
                ?>
                <div class="card">
                    <h3><?= $class->name ?></h3>
                    <p><?= $class->schedule ?></p>
                    <p><?= $teacher->firstname ?> <?= $teacher->lastname ?></p>
                    <p>Note : <?= $classID->note ?> / <?= $class->coefficient ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php
include_once 'footer.php';
