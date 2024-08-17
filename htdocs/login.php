<?php
session_start();
if (isset($_SESSION['admin'])){
    if ($_SESSION['admin'] == 1){
        header('Location: /admin.php');
        exit();
    };
}else{
    if ($_POST['login'] == 'admin' and $_POST['password'] == 123){
        $_SESSION['admin'] = 1;
        header('Location: /admin.php');
      }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet"> 
        <link rel="shortcut icon" href="static/IMG/favicon.ico" type="image/x-icon">
        <title>admin-panel</title>
      </head>
    <body>
    <div class="wrapper_center">
        <form action="" method="post">
            <div><label>Login:</label><input type="text" name="login"></div>
            <div><label>Password:</label><input type="password" name="password"></div>
            <div><button type="submit"> Log in </button></div>
            <p style="color:red"></p>
        </form>
    </div>
    </body>
    <style>
        body{
        display:flex;
        justify-content: space-around;
        height: 100vh;
        }

        body *{
        font-family:montserrat;
        font-size: 20px;
        }

        form{
        border: 2px solid black;
        padding: 10px;
        }

        input{
        width: 230px;
        }

        .wrapper_center{
        margin-top: 40vh;
        height: 40%;
        width: 400px;
        }

        .wrapper_center div{
        padding: 10px;
        justify-content: space-between;
        display: flex;
        }

        button{
        width: 60%;
        margin: 0 auto;
        padding: 10px 0;
        color: white;
        font-weight: bold;
        background-color: black;
        border: 1px solid black;
        border-radius: 15px;
        transition: 0.4s;
        }

        button:hover{
        color: black;
        background-color:white;
        }
    </style>
</html>

