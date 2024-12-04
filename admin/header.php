<?php
global $page;
$version = time();
//$page = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/app.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../assets/css/global.css?v=<?= $version ?>"/>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <a href="../index.php" class="logo">EDU SPHERE admin</a>
    <a href="dashboard.php" class="<?= $page == "Dashboard" ? "active" : "" ?>">Dashboard</a>
    <a href="students.php" class="<?= $page == "Students" ? "active" : "" ?>">Students</a>
    <a href="teachers.php" class="<?= $page == "Teachers" ? "active" : "" ?>">Teachers</a>
    <a href="classes.php" class="<?= $page == "Classes" ? "active" : "" ?>">Classes</a>
    <a href="../logout.php" class="button">Logout</a>
</div>