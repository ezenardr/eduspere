<?php
global $page;
$version = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $page ?> - Students</title>
    <link rel="stylesheet" href="../assets/css/app.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../assets/css/global.css?v=<?= $version ?>"/>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <a href="../index.php" class="logo">EDU SPHERE</a>
    <a href="dashboard.php" class="<?= $page == "Dashboard" ? "active" : "" ?>">Dashboard</a>
    <a href="my-classes.php" class="<?= $page == "My Classes" ? "active" : "" ?>">My Classes</a>
    <a href="profile.php" class="<?= $page == "Profile" ? "active" : "" ?>">Profile</a>
    <form>

    <a class="button" href="../logout.php">Logout</a>
    </form>
</div>