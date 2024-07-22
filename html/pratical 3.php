<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/page.css">

    </head>
    <body style="display:block;">
    <h2>Join TAR UC'S Interest Club</h2>
        
        <form action="pratical 3.php" method="post">
            <table>
            <tr><td>Gender:</td><td><input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F">Female</td></tr>
            <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
            <tr><td>Mobile Phone:</td><td><input type="text" name="phone"></td></tr>
            <tr><td>Interest Clubs:</td><td>
            <input name="club[]" type="checkbox" value="LD">Ladies Club<br>
            <input name="club[]" type="checkbox" value="GT">Gentlemen Club<br>
            <input name="club[]" type="checkbox" value="DT">DOTA and Gaming Club<br>
            <input name="club[]" type="checkbox" value="MG">Manga and Comic Club<br>
            <input name="club[]" type="checkbox" value="PS">Pet Society Club<br>
            <input name="club[]" type="checkbox" value="FV">Farmville Club<br>
</td></tr>
            <tr><td colspan="2"><input type="submit" name="submit"><input type="reset"></td></tr>
        </table>
        </form>
        <?php
        $c=array(
            'LD' =>'Ladies Club',
            'GT' =>'Gentlemen Club',
            'DT' =>'DOTA and Gaming Club',
            'MG' =>'Manga and Comic Club',
            'PS' =>'Pet Society Club',
            'FV' =>'Farmville Club'
        );
        $error=array();
        if(isset($_POST['submit'])){
            if(empty($_POST['name'])){
                $error[]="Name is empty";
            }
                else{
                    $name=$_POST['name'];

                }
        if(empty($_POST['gender'])){
                $error[]="Gender is empty";
            }
                else{
            $gender=$_POST['gender'];
            $g=($gender=='M')?'Mr':'Ms';
                }
        if(empty($_POST['club'])){
                $error[]="Club is empty";
            }
                else{
                    $club=$_POST['club'];
                }
            if(count($error)>0){
                echo "<h3>Oooops.. There're input error</h3>";
                echo "<ul>";
                foreach($error as $value){
                    echo "<li>$value</li>";
                }
                echo "</ul>";
            }else{
            echo "<h3>$g.$name</h3>";
            echo "<p>You have joined the following clubs:</p>";
            echo "<ul>";
            foreach($club as $value){
                echo "<li>{$c[$value]}($value)</li>";
            }
            echo "</ul>";
        }
        }
        ?>
        <br>
        <br>
        <h3>Simple Calculator</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <table>
                <tr><td>Number 1:</td><td><input name="n1" value="<?php echo $_POST['n1']??''?>"></td></tr>
                <tr><td>Number 2:</td><td><input name="n2" value="<?php echo $_POST['n2']??''?>"></td></tr>
                <tr><td colspan="2"><input name="submit" type="submit" value="Add">
                <input name="submit" type="submit" value="Minus">
                <input name="submit" type="submit" value="Multiply">
                <input name="submit" type="submit" value="Divide">
                <input type="button" value="Reset" onclick="location='pratical 3.php'"></td></tr>
            </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $method=$_POST['submit'];
        $n1=$_POST['n1'];
        $n2=$_POST['n2'];
        switch($method){
            case 'Add':
                $operator = '+';
                $ans=$n1+$n2;
                break;
                case 'Minus':
                    $operator = '-';
                    $ans=$n1-$n2;
                    break;
                    case 'Multiply':
                        $operator = '*';
                        $ans=$n1*$n2;
                        break;
                        case 'Divide':
                            $operator = '/';
                            $ans=$n1/$n2;
                            break;
                            default:
                            break;
        }
        echo "<div>
        $method:$n1 $operator $n2 =$ans
        </div>";
    
    }
    ?>
</body>

</html>