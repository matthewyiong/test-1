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
        $sid=$_REQUEST['sid'];
        $sql = "selected * from student where StudentID='{$sid}'";
        $r=$conn->query($sql);
        $row = $r->fetch_assoc();
        extract($row);
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['name'];
            $gender=$_POST['gender']??'';
            $program=$_POST['program'];

            $sql="update student set StudentName='{$name}',
            Gender='{$gender}',Program='{$program}'where StudentID='{$sid}'";
            $r =$conn->query($sql);
            $msg="Student $name hase been update!";
        }
        $conn ->close();
        ?>
        <nav>[<a href="p4.php">List Student</a> | <a href="p3.php">Insert Student</a>]</nav>
<h3>Edit Student</h3>
<div><p><?php echo $msg?></p></div>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
<nav>[<a href="p4.php">List Student</a> | <a href="p3.php">Insert Student</a>]</nav>
            <table>
                <tr><td>Student ID:</td><td><?php echo $sid?><input name="sid" type="hidden" value="<?php echo $sid?>"></td></tr>
                <tr><td>Student Name:</td><td><input name="name" value="<?php echo $name?>"></td></tr>
                <tr><td>Gender:</td><td><input name="gender" type="radio" value="F" <?php if($gender=='F') echo 'checked'?> >Female
            <input name="gender" type="radio" value="M" <?php if($gender=='M') echo 'checked'?> >Male</td></tr>
            <tr><td>Program:</td><td>
                <select name="program">
                    <option value="">--Select One--</option>
                    <option value="IA" <?php if($program=='IA') echo 'selected'?> >Information Sysytem Engineering</option>
                    <option value="IB" <?php if($program=='IB') echo 'selected'?> >Business Information Systems </option>
                    <option value="IT"  <?php if($program=='IT') echo 'selected'?>>Internet Technology</option>
                    </select>
</td></tr>
<tr><td colspan="2"><input name="submit" type="submit" value="Insert">
<input type="reset" value="Cancel"></td></tr>
</table>

</form>
</body>

</html>