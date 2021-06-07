<?php
include "db.php";
if (isset($_POST["action"])) {
    if ($_POST["action"] == "login") {
        $userData = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        );
        //check if user exists
        if (userExistsByUsername($userData["username"])) {
            $databaseUser = getUserByUsername($userData["username"]);

            if($databaseUser["user_type"] == 2){
                //login
                if (password_verify($userData["password"], $databaseUser["password"])) {
                    $userKey = md5(uniqid());
                    setUserKey($databaseUser["id"], $userKey);
                    setcookie("user_key", $userKey, time() + (86400*30), "/");
                    header("Location: ../captain/main.php");
                } else {
                    echo "Wrong password!";
                }
            }
            else{
                echo "There isn't such captain in the database!";
            }
        }
        //register
    } else if($_POST["action"] == "register") {
        $userData = array(
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "confirmPassword" => $_POST["confirmPassword"],
            "PIN" => $_POST["PIN"],
            "type" => $_POST["type"],
            "phone_number" => $_POST["phone_number"]
        );
        if(validateRegister($userData)) {
            //check if user exists
            if(!userExistsByUsername($userData["username"])) {
                //add captain
                if(addCaptain($userData)) {
                    $databaseUser = getUserByUsername($userData["username"]);
                    $userKey = md5(uniqid());
                    setUserKey($databaseUser["id"], $userKey);
                    $user_id = $databaseUser["id"];
                    $first_name = $databaseUser["first_name"];
                    $last_name = $databaseUser["last_name"];
                    $phone_number = $databaseUser["phone_number"];
                    $PIN = $databaseUser["PIN"];
                    $username = $databaseUser["username"];
                    $type = $databaseUser["type"];
                    $db->query("INSERT INTO `captains` (`user_id`, `first_name`, `last_name`, `phone_number`, `PIN`, `username`, `type`) VALUES ('$user_id', '$first_name', '$last_name', '$phone_number', '$username', '$type')");
                    if ($db->error) {
                        printf("Errormessage: %s\n", $db->error);
                    }

                    header("Location: ../admin/main.php");
                } else {
                    echo "There was problem with adding the user to the database.";
                }
            } else {
                echo "The username is already taken.";
            }
        }
    }
} else {
    die("Invalid request.");
}
?>