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
            //login
            if($databaseUser["user_type"] == 1){
                if (password_verify($userData["password"], $databaseUser["password"])) {
                    $userKey = md5(uniqid());
                    setUserKey($databaseUser["id"], $userKey);
                    setcookie("user_key", $userKey, time() + (86400*30), "/");
                    header("Location: ../admin/main.php");
                } else {
                    echo "Wrong password!";
                }
            }
            else{
                echo "Not an admin user!";
            }
        }
        else{
            echo "Some error!";
        }
    }
} else {
    die("Invalid request.");
}
?>