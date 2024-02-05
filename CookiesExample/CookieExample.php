<?php
$accessCount = 1;
if(isset($_COOKIE['counter']))
{
    $accessCount = intval($_COOKIE['counter']);
    $accessCount++;
    setcookie("counter", $accessCount . "",time()+(86400*30));
} else {
    $accessCount = 1;
    setcookie("counter", $accessCount . "",time()+(86400*30));
}

?>
<!doctype html>
<html>
    <head>
        <title>Cookies Example</title>
    </head>
    <body>
        <h1>Page Access count:<?=$accessCount?></h1>
    </body>
</html>