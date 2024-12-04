<?php
$page = "Dashboard";
include_once 'header.php';
session_start();

include "../functions/teacher.php";
include "../functions/student.php";
include "../functions/class.php";
$teachers = count(getTeachers());
$students = count(getStudents());
$classes = count(getClasses());
$users = lastInsertedUserID();
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1><?= $_SESSION['firstname'] ?> - Admin Dashboard</h1>
        </div>

        <!-- Stats Cards -->
        <div class="cards">
            <div class="card">
                <h3>Total Students</h3>
                <p><?= $students?></p>
            </div>
            <div class="card">
                <h3>Total Teachers</h3>
                <p><?= $teachers?></p>
            </div>
            <div class="card">
                <h3>Total Classes</h3>
                <p><?= $classes?></p>
            </div>
        </div>

        <div class="card">
            <h3>Recent Insertions</h3>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user -> firstname ?> <?= $user -> lastname ?></td>
                    <td><?= $user -> email ?></td>
                    <td><?= $user->role ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include_once 'footer.php';
