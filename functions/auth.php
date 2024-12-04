<?php
require 'database/connection.php';
session_start();

function register($formData){
    $db = getConnection();
    $data = [
        ":firstname" => $formData["firstname"],
        ":lastname" => $formData["lastname"],
        ":email" => $formData["email"],
        ":password" => password_hash($formData["password"], PASSWORD_BCRYPT),
        ":dob" => $formData["dob"],
        ":gender" => $formData["gender"],
        ":phone_number" => $formData["phone_number"],
        "role" => "student"
    ];
    $query = "INSERT INTO users (firstname, lastname, email, password, dob, gender, phone_number, role, created_at) 
                value (:firstname, :lastname, :email, :password, :dob, :gender, :phone_number, :role, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute($data);
    $registered =  $db -> lastInsertId()>0;
    if($registered>0){
        header("location: login.php");
        return 1;
    }else{
        return 0;
    }
}

function login($formData){
    $db = getConnection();
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt -> execute([":email" => $formData["email"]]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    if(!$data){
        return "User not Found";
    }
    if(password_verify($formData["password"], $data->password)){
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $data->user_id;
        $_SESSION['email'] = $data->email;
        $_SESSION['role'] = $data->role;
        $_SESSION['firstname'] = $data->firstname;
        header("location: index.php");
        return $data;
    }else{
        return "Incorrect password";
    }
}

