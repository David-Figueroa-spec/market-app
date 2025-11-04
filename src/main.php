<?php
//echo "Welcome to main !!"
session_start();

if(!isset($_SESSION['session_user_id'])){
     header('refresh:0;url=error_403.html');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"href="icon/market_main" >
    <title>Marketapp - Home</title>
</head>
<body>
    <br>
    <center><h10>User:</b>Here print your name</h10></center>
    <br>
    <center><a href = "list_users.php">list all users</a> | 
    <a href = "logout.php">logout</a></center>
</body>
</html>