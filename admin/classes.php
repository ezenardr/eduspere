<?php
$page = "Classes";
include_once 'header.php';
include_once '../functions/class.php';
include_once '../functions/teacher.php';
$classes = getClasses();

if (isset($_POST['submit'])) {
    deleteClass($_POST['class_id']);
}
?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1>Classes</h1>
            <a href="add-class.php" class="add-btn">Add New Classes</a>
        </div>
        <div class="card">
            <h3>Classes List</h3>
            <form method="POST">
                <table>
                    <thead>
                    <tr>
                        <th>Class ID</th>
                        <th>Name</th>
                        <th>Coefficient</th>
                        <th>Schedule</th>
                        <th>Teacher</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($classes as $class): ?>
                        <?php
                        $teacher = getTeacher($class->teacher_id);
                        ?>
                        <tr>
                            <td><?= $class->class_id ?></td>
                            <td><?= $class->name ?></td>
                            <td><?= $class->coefficient ?></td>
                            <td><?= $class->schedule ?></td>
                            <td><?= $teacher->firstname ?> <?= $teacher->lastname ?></td>
                            <td>
                                <div class="actions-block">
                                    <a href="edit-class.php?id=<?= $class->class_id ?>">
                                        <img src="../assets/icons/edit.svg" alt="edit icon"/></a>
                                    <label>
                                        <input hidden="hidden" type="text" name="class_id"
                                               value="<?= $class -> class_id ?>">
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
