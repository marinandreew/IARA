<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

function validateRegister($userData) {
    if($userData["username"] == "" || $userData["password"] == "" || $userData["email"] == "") {
        return false;
    } 
    if($userData["password"] != $userData["confirmPassword"]) {
        return false;
    } return true; 
}

function userExistsByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return ($result->num_rows > 0); 
}

function userExistsByEmail($email) {
    global $db;
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();   
    return ($result->num_rows > 0); 
}

function addCaptain($userData) {
    global $db;
    $sql = "INSERT INTO users (username, password, email, user_type, time, user_key, phone_number) VALUES(?, ?, ?, 2, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $encryptedPassword = password_hash($userData["password"], PASSWORD_DEFAULT);
    $time = time();
    $userKey = "";
    $stmt->bind_param("ssssis",
        $userData["username"], 
        $encryptedPassword,
        $userData["email"],
        $time,
        $userKey,
        $userData["phone_number"]
    );
    return $stmt->execute(); 
}

function addInspector($userData) {
    global $db;
    $sql = "INSERT INTO users (username, password, email, user_type, time, user_key, phone_number) VALUES(?, ?, ?, 3, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $encryptedPassword = password_hash($userData["password"], PASSWORD_DEFAULT);
    $time = time();
    $userKey = "";
    $stmt->bind_param("ssssis",
        $userData["username"], 
        $encryptedPassword,
        $userData["email"],
        $time,
        $userKey,
        $userData["phone_number"]
    );
    return $stmt->execute(); 
}

function getUserByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getCaptainByUsername($username) {
    global $db;
    $sql = "SELECT * FROM captains WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getShipById($id) {
    global $db;
    $sql = "SELECT * FROM ships WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getUserByKey($userKey) {
    global $db;
    $sql = "SELECT * FROM users WHERE user_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $userKey);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function setUserKey($user_id, $key) {
    global $db;
    $sql = "UPDATE users SET user_key = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $key, $user_id);
    return $stmt->execute(); 
}

?>