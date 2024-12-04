<?php
require_once '../database/connection.php';

function lastInsertedUserID(){
    $db = getConnection();
    $query = "SELECT * FROM users ORDER BY created_at DESC LIMIT 5;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getStudents(){
    $db = getConnection();
    $query = "SELECT * FROM users WHERE role='student'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt -> fetchAll(PDO::FETCH_OBJ);
}

function getStudent($id){
    $db = getConnection();
    $query = "SELECT * FROM users WHERE user_id=:id";
    $stmt = $db->prepare($query);
    $stmt->execute(['id' => $id]);
    return $stmt -> fetch(PDO::FETCH_OBJ);
}

function editStudent($id, $formData){
    $db = getConnection();
    $data = [
        'firstname' => $formData['firstname'],
        'lastname' => $formData['lastname'],
        "dob" => $formData['dob'],
        ":id" => $id,
    ];
    $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, dob = :dob, updated_at = NOW() where user_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    header("location: profile.php");
    return 1;
}
function addStudentToClass($studentID, $classID){
    $db = getConnection();
    $query = "INSERT INTO students_classes (class_id, student_id) value (:class_id, :student_id)";
    $stmt = $db->prepare($query);
    $stmt->execute(['class_id' => $classID, 'student_id' => $studentID]);
    header("location: add-class.php");
    return 1;
}

function removeStudentFromClass($studentID, $classID){
    $db = getConnection();
    $query = "DELETE FROM students_classes where class_id = :class_id and student_id = :student_id";
    $stmt = $db->prepare($query);
    $stmt->execute([':class_id' => $classID, ':student_id' => $studentID]);
    header("location: add-class.php");
    return 1;

}

function isStudentInClass($studentID, $classID){
    $db = getConnection();
    $query = "SELECT * FROM students_classes WHERE class_id = :class_id AND student_id = :student_id";
    $stmt = $db->prepare($query);
    $stmt->execute(['class_id' => $classID, 'student_id' => $studentID]);
    $result = $stmt -> fetch(PDO::FETCH_OBJ);
    if ($result != null){
    return true;
    }
    return false;
}

function getStudentClassesID($studentID){
    $db = getConnection();
    $query = "SELECT * FROM students_classes WHERE student_id = :student_id";
    $stmt = $db->prepare($query);
    $stmt->execute(['student_id' => $studentID]);
    return $stmt -> fetchAll(PDO::FETCH_OBJ);
}