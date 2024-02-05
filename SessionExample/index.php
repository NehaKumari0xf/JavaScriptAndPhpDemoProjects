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
        <h1>Hello Mr./Miss <?=$user['name']?></h1>
        <h1>Class:<?=$user['class']?>, Roll:<?=$user['roll']?></h1>
    </body>
</html>