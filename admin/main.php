<?php
include "../functions/db.php";
$databaseUser = getUserByUsername($userinfo["username"]);
if($databaseUser["user_type"] == 1){ ?>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<div class="loginbox">
    <div class="form-group">
        <a href='addSubject.php'><input type="submit" value="Add subject" class="btn btn-primary"></a>
    </div>
    <div class="form-group">
        <a href='addTeacher.php'><input type="submit" value="Add teacher" class="btn btn-primary"></a>
    </div>
    <div class="form-group">
        <a href='addStudent.php'><input type="submit" value="Add student" class="btn btn-primary"></a>
    </div>
    <div class="form-group">
        <a href='studentList.php'><input type="submit" value="Class List" class="btn btn-primary"></a>
    </div>
    <div class="form-group">
        <a href="../functions/logout.php"><input type="submit" value="Logout" class="btn btn-primary"></a>
    </div>
</div>
<?php
}