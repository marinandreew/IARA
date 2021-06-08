<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iara';
$connection = new mysqli($server, $username, $password, $dbname);
function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

$test = generatePassword();
$mysql = "SELECT * FROM codes WHERE '$test'";
if($connection->query($mysql) != False){ 
    $mysql = "INSERT INTO codes (`id`, `type`) VALUES ('$test', 'cap')";
    $connection->query($mysql);
 } 

 ?>