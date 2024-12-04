<?php
$page = "Dashboard";
include_once 'header.php';
session_start();
?>
    <div class="main-content">
        <div class="top-bar">
            <h1>Welcome Back, <?= $_SESSION['firstname'] ?></h1>
        </div>
    </div>
<?php
include_once 'footer.php';
