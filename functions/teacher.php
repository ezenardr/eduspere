<?php
require_once '../database/connection.php';

function registerTeacher($formData){
    $db = getConnection();
    $data = [
        ":firstname" => $formData["firstname"],
        ":lastname" => $formData["lastname"],
        ":email" => $formData["email"],
        ":password" => password_hash($formData["password"], PASSWORD_BCRYPT),
        ":dob" => $formData["dob"],
        ":gender" => $formData["gender"],
        ":phone_number" => $formData["phone_number"],
        "role" => "teacher"
    ];
    $query = "INSERT INTO users (firstname, lastname, email, password, dob, gender, phone_number, role, created_at) 
                value (:firstname, :lastname, :email, :password, :dob, :gender, :phone_number, :role, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    $registered =  $db -> lastInsertId()>0;
    if($registered>0){
        header("location: teachers.php");
        return 1;
    }else{
        return 0;
    }
}

function getTeachers(){
    $db = getConnection();
    $query = "SELECT * FROM users WHERE role = 'teacher'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTeacher($id){
    $db = getConnection();
    $query = "SELECT * FROM users WHERE user_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([":id" => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}
function editTeacher($id, $formData){
    $db = getConnection();
    $data = [
        ":firstname" => $formData["firstname"],
        ":lastname" => $formData["lastname"],
        ":dob" => $formData["dob"],
        ":id" => $id
    ];

    $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, dob = :dob, updated_at = NOW() WHERE user_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    header("location: teachers.php");
}

function editTeacherProfile($id, $formData){
    $db = getConnection();
    $data = [
        ":firstname" => $formData["firstname"],
        ":lastname" => $formData["lastname"],
        ":dob" => $formData["dob"],
        ":id" => $id
    ];

    $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, dob = :dob, updated_at = NOW() WHERE user_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    header("location: profile.php");
}

function deleteTeacher($id){
    $db = getConnection();
    $query = "DELETE FROM users WHERE user_id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute([":id" => $id]);
    header("location: teachers.php");
}