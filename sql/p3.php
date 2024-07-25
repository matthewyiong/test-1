<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
    <?php

$conn= new mysqli('localhost','root','','p4');

$name = $sid =$program=$msg='';
if($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $program = $_POST['program'];
    $sql = "INSERT INTO student (StudentID,StudentName,Gender,Program) VALUES 
    ('{$sid}','{$name}','{$gender}','{$program}')";
    $r=$conn->query($sql);
    if($r){
        $msg = "Student $name has insert Success";
    }
}

?>
        <nav>[<a href="p4.php">List Student</a> | <a href="p3.php">Insert Student</a>]</nav>
        <h3>Insert Student</h3>
        <div><p><?php echo $msg ?></p></div>
        <form action="<?php echo $_SERVER['PHP_SELF']?>"method='post'>
            <table>
                <tr><td>Student ID:</td><td><input name="sid"></td></tr>
                <tr><td>Student Name:</td><td><input name="name"></td></tr>
                <tr><td>Gender:</td><td><input name="gender" type="radio" value="F">Female
            <input name="gender" type="radio" value="M">Male</td></tr>
            <tr><td>Program:</td><td>
                <select name="program">
                    <option value="">--Select One--</option>
                    <option value="IA">Information Sysytem Engineering</option>
                    <option value="IB">Business Information Systems </option>
                    <option value="IT">Internet Technology</option>
                    </select>
</td></tr>
<tr><td colspan="2"><input name="submit" type="submit" value="Insert">
<input type="reset" value="Cancel"></td></tr>
</table>

</body>

</html>