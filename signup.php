



<?php
  
  
  
  
  if($_SERVER['REQUEST_METHOD']=='POST')
  {

    include 'connection.php';
    
    $username = $_POST["UserName"];
    $password = $_POST["Password"];
    $sql_check_user = "Select * from `users` where `UserName`='$username'";
    $result= mysqli_query($con,$sql_check_user);
    if ($result)
    {
        $num_of_records = mysqli_num_rows($result);
        if ($num_of_records > 0)
        {
            echo '<script>alert("Please choose another username")</script>';
        } 
        else 
        {
            $sql = "INSERT INTO `users`(`UserName`, `Password`,`ISAdmin`) VALUES ('$username','$password',0)";
            $result= mysqli_query($con,$sql);
            if ($result)
            {
                echo '<script>alert("Your account is created!")</script>';
                header("Location: http://localhost/resit/login.php");
                exit;
            }
            else
            {
                die(mysqli_error($con));
            }
        
        }
    }
    else 
    {
        die(mysqli_error($con));
    }



  }
?>
<!DOCTYPE html>
<html lang="el">
<head>
<META CHARSET="UTF-8">
    <meta http="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width",
    intial-scale=1.0>
    <link rel="stylesheet" href="style.css">
<title>Amazing Movies for you to pick</title>

</head>
<body>
    <form action = "signup.php" method="post">
    <div class="wrapper">
        <form action="">
            <h1>Sign up to our website</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name = "UserName"
                 required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name = "Password"
                 required>
            </div>

            <button type=" submit" class="btn" >Create Account!</button>
            <p>Already have an account?</p> 
            <a href="login.php">Log in </a> 
        </form>
    </div>
</body>
</html>