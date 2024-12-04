<?php
require_once '../database/connection.php';

function addClass($formData)
{
    $db = getConnection();
    $data = [
        ":name" => $formData['name'],
        ":coefficient" => $formData['coefficient'],
        ":teacher_id" => $formData['teacher_id'],
        ":schedule" => $formData['schedule']
    ];
    $query = "INSERT INTO classes (name, coefficient, teacher_id, schedule, created_at) value(:name, :coefficient, :teacher_id, :schedule, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    header("location: classes.php");
    return 1;

}

function getClasses()
{
    $db = getConnection();
    $query = "SELECT * FROM classes";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getClass($id)
{
    $db = getConnection();
    $query = "SELECT * FROM classes WHERE class_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function editClass($formData, $id)
{
    $db = getConnection();
    $data = [
        ":name" => $formData['name'],
        ":coefficient" => $formData['coefficient'],
        ":teacher_id" => $formData['teacher_id'],
        ":schedule" => $formData['schedule'],
        ":id" => $id
    ];
    $query = "UPDATE classes SET name = :name, coefficient = :coefficient, teacher_id = :teacher_id, schedule = :schedule, updated_at = NOW() WHERE class_id = :id ";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    header("location: classes.php");
    return 1;
}

function deleteClass($id)
{
    $db = getConnection();
    $query = "DELETE FROM classes WHERE class_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $id]);
    header("location: classes.php");
    return 1;
}

function getTeacherClasses($teacher_id)
{
    $db = getConnection();
    $query = "SELECT * FROM classes WHERE teacher_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $teacher_id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getStudentsInClass($class_id)
{
    $db = getConnection();
    $query = "SELECT * FROM students_classes WHERE class_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $class_id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function assignNote($class_id, $student_id, $note)
{
    $db = getConnection();
    $query = "UPDATE students_classes SET note = :note WHERE student_id = :student_id AND class_id = :class_id";
    $stmt = $db->prepare($query);
    $stmt->execute([':class_id' => $class_id, ':note' => $note, ':student_id' => $student_id]);
    header("location: class.php?id=$class_id");
    return 1;
}