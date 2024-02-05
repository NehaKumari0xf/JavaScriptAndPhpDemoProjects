<?php
/*
it will accept user id and pwd from user and send it to server
server will validate the id and pwd
if valid the redirect to index.php
on failure display error message
*/

$err = "";
if(isset($_POST['id']))
{
    try
    {
        $con = new PDO("mysql:host=localhost;dbname=ricla", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare("select * from students where userid=:id and pwd=:pwd");
        $stmt->bindValue(":id", $_POST['id']);
        $stmt->bindValue(":pwd", $_POST['pwd']);

        $stmt->execute();

        $recs = $stmt->fetchAll();

        if(count($recs)==1)
        {
            session_start();
            $_SESSION['id'] = $recs[0]['id'];
            //redirect to index page
            header("location:index.php");
        }
        else
        {            $err = "Invalid id or password";
        }


    }catch(Exception $ex)
    {
        $err = $ex->getMessage();
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
        if($err!="")
        {
            echo '<p style="color:red">' . $err . '</p>';
        }
        ?>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label>User Id</label><input type="text" name="id" required/><br/>
            <label>Password</label><input type="password" name="pwd" required/><br/>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>