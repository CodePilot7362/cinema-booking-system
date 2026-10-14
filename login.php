

<?php




  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    include 'connection.php';
    $username = $_POST["UserName"];
    $password = $_POST["Password"];
    

    

    $sql_check_user = "Select * from `users` where UserName='$username' and Password= '$password'";
    echo $sql_check_user;

    $result= mysqli_query($con,$sql_check_user,);
    if ($result)
    {
        $num_of_records = mysqli_num_rows($result);
        
        if ($num_of_records > 0)
        {
            
            
            session_start();
            $_SESSION['username_session'] = $username;

            $row = $result->fetch_assoc();
            // αμα η το στοιχειο στην στηλη απροωε ειναι 1 τοτε ειναι αντμιν οποτε θα μπει στη σελιδα με τισ κρατησεισ 
            if ($row["ISAdmin"] ==1)
            {
                $_SESSION['ISAdmin'] = 1;
                header("Location: http://localhost/resit/approval.php");
                exit; 
    
            }
            else 
            {
                // αλλιωσ στη σελιδα με τισ ταινιεσ να κανει κρατηση 
                $_SESSION['ISAdmin'] = 0;
                header("Location: http://localhost/resit/moviemenu.php");
                exit; 
    
            }
            
        } 
        else 
        {
            //ο κωδικοσ υπαρχει η τα δεν δεχετε τα στοιχεια 
            echo '<script>alert("INVALID DATA !!!!!")</script>';
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
    <form action = "login.php" method="post">
   
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name = "UserName"
                 required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name = "Password"
                 required>
            </div>

            <button type=" submit" class="btn">Login</button>
            
            <p>Don't have an account?</p> 
            <a href="signup.php">Sign up</a> 
            
    
        </form>
    </div>
</body>
</html>
