<?php
$page = "Students";
include_once "header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Bar -->
    <div class="top-bar">
        <h1><a href="students.php" style="margin-right: 20px">&larr;</a>Add New Student</h1>
    </div>
    <form method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="class">Class:</label>
        <select id="class" name="class" required>
            <option value="">Select Class</option>
            <option value="Grade 1">Grade 1</option>
            <option value="Grade 2">Grade 2</option>
            <option value="Grade 3">Grade 3</option>
            <!-- Add more classes as needed -->
        </select>


        <button type="submit" class="add-btn">Add Student</button>
    </form>


</div>
<?php
include_once 'footer.php';
