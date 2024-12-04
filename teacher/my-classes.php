<?php
$page = "My Classes";
include_once 'header.php';
include_once '../functions/class.php';
session_start();
$classes = getTeacherClasses($_SESSION['user_id']);
?>
    <div class="main-content">
        <div class="top-bar">
            <h1>Classes</h1>
        </div>
        <div class="cards">
            <?php foreach ($classes as $class): ?>
                <a href="class.php?id=<?= $class->class_id ?>" class="card">
                    <h3><?= $class->name ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php
include_once 'footer.php';
