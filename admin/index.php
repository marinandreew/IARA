<?php
include "../functions/db.php";
?>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<h1>Admin Login</h1>
<div class="log-box">
    <div class="loginbox">
        <img src="../images/avatar1.png" class="avatar">
        <form method="POST" action="../functions/userAdmin.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Please enter your username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Please enter your password" id="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
                <input type="hidden" name="action" value="login">
            </div>
        </form>
    </div>
</div>