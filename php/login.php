<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$servername="localhost";
$username="root";
$userpassword="";
$dbname="userdatabase";

$conn=new mysqli($servername,$username,$userpassword,$dbname);

if($conn->connect_error){
    die("connect_error" . $conn->connect_error);
}
$sql="INSERT INFO users(name, email, password) VALUES('$name,$email,$password')";
if($conn->query($sql)===TRUE){
    echo "good";
}else{
    echo "error";
}
$conn->close();
?>
