<?php








$file='userdata.json';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$loginName=$_POST['loginname'];
$loginPassword=$_POST['loginpassword'];
$users = json_decode(file_get_contents($file),true);
foreach($users as $user){
    if($user['registerName']==$loginName && $user['registerPassword']==$loginPassword){
        header("Location: home.html");
        exit();
    }else{
        echo "password or username invalid, Please Re-enter";
        
    }
}
}
?>
