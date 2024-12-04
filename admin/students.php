<?php
$page = "Students";
include_once 'header.php';
include "../functions/student.php";

$students = getStudents();
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1>Students</h1>
<!--            <a href="add-student.php" class="add-btn">Add New Student</a>-->
        </div>

        <!-- Orders Table -->
        <div class="card">
            <h3>Students List</h3>
            <table>
                <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
<!--                    <th>Actions</th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= $student -> user_id ?></td>
                    <td><?= $student -> firstname ?> <?= $student -> lastname ?></td>
                    <td><?= $student->email ?></td>
                    <td><?= $student -> dob ?></td>
<!--                    <td>-->
<!--                        <div class="actions-block">-->
<!--                            <a href="edit-student.php?id=1">-->
<!--                                <img src="../assets/icons/edit.svg" alt="edit icon"/></a>-->
<!--                            <img src="../assets/icons/trash.svg" alt="edit icon"/>-->
<!--                        </div>-->
<!--                    </td>-->
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include_once 'footer.php';
