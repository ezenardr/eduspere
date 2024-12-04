<?php
$page = "My Classes";
include_once 'header.php';
include_once "../functions/class.php";
include_once "../functions/student.php";
$class = getClass($_GET['id']);
$studentsIDs = getStudentsInClass($_GET['id']);
if (isset($_POST['submit'])) {
    assignNote($_GET['id'], $_POST['student_id'], $_POST['note']);
}
?>
    <div class="main-content">
        <div class="top-bar">
            <h1><a href="my-classes.php" style="margin-right: 20px">&larr;</a><?= $class->name ?></h1>
        </div>
        <div class="card">
            <h3>Students List</h3>
            <form method="POST">
                <table>
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($studentsIDs as $studentID): ?>
                        <form method="POST">
                            <?php $student = getStudent($studentID->student_id);
                            ?>
                            <tr>
                                <td><?= $student->user_id ?></td>
                                <td><?= $student->firstname ?> <?= $student->lastname ?></td>
                                <td><?= $student->email ?></td>
                                <td style="display: flex; justify-content: space-between">

                                    <label>
                                        <input type="text" placeholder="note" name="note"
                                               value="<?= $studentID->note ?>" required/>
                                        <input type="text" name="student_id" value="<?= $studentID->student_id ?>"
                                               hidden="hidden">
                                    </label>
                                    <button type="submit" name="submit">Submit</button>

                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    </div>
<?php
include_once 'footer.php';
