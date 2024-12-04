<?php
$page = "Teachers";
include_once 'header.php';
include "../functions/teacher.php";
$teachers = getTeachers();
if (isset($_POST['submit'])) {
    deleteTeacher($_POST['user_id']);
}
?>
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1>Teachers</h1>
            <a href="add-teacher.php" class="add-btn">Add New Teacher</a>
        </div>
        <div class="card">
            <h3>Teachers List</h3>
            <form method="POST">
            <table>
                <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($teachers as $teacher): ?>
                    <tr>
                        <td><?= $teacher['user_id'] ?></td>
                        <td><?= $teacher['firstname'] ?> <?= $teacher['lastname'] ?></td>
                        <td><?= $teacher['email'] ?></td>
                        <td><?= $teacher['dob'] ?></td>
                        <td><?= $teacher['gender'] ?></td>
                        <td>
                            <div class="actions-block">
                                <a href="edit-teacher.php?id=<?= $teacher['user_id'] ?>">
                                    <img src="../assets/icons/edit.svg" alt="edit icon"/></a>
                                    <label>
                                        <input hidden="hidden"  type="text" name="user_id" value="<?= $teacher['user_id'] ?>">
                                    </label>
                                    <button type="submit" style="cursor: pointer" name="submit">
                                        <img src="../assets/icons/trash.svg" alt="edit icon"/>
                                    </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </form>
        </div>
    </div>
<?php
include_once 'footer.php';
