<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE.css">
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, Helvetica, sans-serif;
      }

      form {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        margin: 0 auto;
        max-width: 400px;
        padding: 20px;
      }

      h1 {
        color: #333333;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
      }

      label {
        color: #333333;
        display: block;
        font-size: 18px;
        margin-bottom: 10px;
      }

      input[type="text"],
      input[type="password"] {
        border-radius: 5px;
        border: none;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        padding: 10px;
        width: 100%;
      }

      input[type="submit"] {
        background-color: #333333;
        border:none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
        padding: 10px;
        width: 100%;
      }

      input[type="submit"]:hover {
        background-color: #555555;
      }

      .error {
        color: #ff0000;
        font-size: 16px;
        margin-top: 10px;
        text-align: center;
      }
      </style>
    <title>LOGIN</title>
</head>
<?php 
session_start();
if(!empty($_SESSION["user"])){
    header("location:acceuil.php");
}
?>
<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $quer = "select * from CompteProprietaire WHERE LoginProp = '$username';";
        $result = mysqli_query($con, $quer);
        $row=mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0){
            if($row["motdepasse"]==$password){
                $_SESSION["user"]=$row["nom"]." ".$row["prenom"];
                header("Location: acceuil.php");
            }else{
                $error= "Incorrect password!!";
            }
        } else {
            $error = "Usernmae doesn't exist!!";
        }
    } else{
        
        $error = "Enter your username and passwords";
    }
}
?>
<body>
    <form method='POST'>
        
            <h1>Authentication</h1>
            <?php
            if (isset($error)) {
                echo '<p class="error">' . $error . '</p>';
            }
            ?>
            <label for="username">Login</label>
            <input type="text" name="username" id="username">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="LOGIN" name="submit"><br>
        
    </form>
</body>
</html>