<?php
session_start();
if(!isset($_SESSION['id']))
{
    //redirect to login page
    header("location:login.php");
}
$con = null;
$user = null;
$err = "";
try{
    $con = new PDO("mysql:host=localhost;dbname=ricla", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare("select * from students where id=:id");
    $stmt->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);

    $stmt->execute();

    $user = $stmt->fetch();
}catch(Exception $ex)
{
    $err = $ex->getMessage();
}

?>
<!doctype html>
<html>
    <head>
        <title><?=$user['name']?></title>
    </head>
    <body>
        <?php
        include 'navigation.php';
        ?>
        
        <?php
        $totalMarks = $user['hin'] + $user['eng'] + $user['math'] + $user['science'] + $user['sst'];
        ?>
        <table>
            <tr><th colspan="2">RICLA</th></tr>
            <tr><td>Name:</td><td><?=$user['name']?></td></tr>
            <tr><td>Class</td><td><?=$user['class']?></td></tr>
            <tr><td>Roll</td><td><?=$user['roll']?></td></tr>
            <tr><td colspan="2">Marks Details</td></tr>
            <tr><td>Hindi</td><td><?=$user['hin']?></td></tr>
            <tr><td>English</td><td><?=$user['eng']?></td></tr>
            <tr><td>Math</td><td><?=$user['math']?></td></tr>
            <tr><td>Science</td><td><?=$user['science']?></td></tr>
            <tr><td>Social Science</td><td><?=$user['sst']?></td></tr>
            <tr><td>Total</td><td><?=$totalMarks?></td></tr>
            <tr><td>Division</td><td>Home Work</td></tr>
        </table>
    </body>
</html>