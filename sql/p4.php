<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <style>
            body{
                display:block;
            }
        </style>
        <nav>[<a href="p4.php">List Student</a> | <a href="p3.php">Insert Student</a>]</nav>
        <h3> List Student</h3>
        <table>
            <tr><th>Student ID</th><th>Student Name</th><th>Gender</th><th> Program</th></tr>
            <?php 
            $conn= new mysqli('localhost','root','','p4');
            if($conn -> connect_error){
                die("Connection failed: " . $conn -> connect_error);
            }
            $sql="select * from student";
            $result=$conn->query($sql);
            while($row = $result -> fetch_assoc()){
                echo "<tr>
                <td>{$row["StudentID"]}</td><td>{$row["StudentName"]}</td><td>{$row['Gender']}<td></td>{$row['Program']}</td</tr>";
            }
                echo "<tr><td colspan=4>$result->num_rows records</td></tr> ";
                $conn->close();
            ?>
</table>
</body>

</html>