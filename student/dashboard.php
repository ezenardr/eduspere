<?php

$page = "Dashboard";
include_once 'header.php';
session_start();
?>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Bar -->
    <div class="top-bar">
        <h1>Welcome Back <?= $_SESSION['firstname']?></h1>
    </div>
</div>
<?php
include_once 'footer.php';
