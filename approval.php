<?php



   include 'checksession.php';


?>




<!DOCTYPE html>

<html lang="el">
<head>
<META CHARSET="UTF-8">
    <meta http="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width",
    intial-scale=1.0>
    <link rel="stylesheet" href="style.css">
<title>Approval</title>

</head>
<body>



<?php

              //φτιαξιμο του οινακα που θα κανει ο αντμιν απροθβ
   
   include 'connection.php';
  echo "<table border='1'>
  <tr>
   <th>Booking_ID</th>
   <th>Movie Name</th>
   <th>User Name</th>
   <th>Zone</th>
   <th>Date</th>
   <th>Seats</th>
   <th>Approve</th>
  </tr>";
  //πρπειε να ενοθσοθμε του πινακεσ για να μπορει να εμαφνιστει οι ταινιεσ στο μενου
  $query = "SELECT * FROM booking, movies  WHERE booking.Movie_ID = movies.Movie_ID  and Approved = 0";
        $result = mysqli_query($con,$query);
        while($row = $result->fetch_assoc()) {
            /*echo "Bookings : ".$row['Booking_ID']."'>".$row['Movie_Name'];*/
            echo "<tr>";
            echo "<td>" . $row['Booking_ID'] . "</td>";
            echo "<td>" . $row['Movie_Name'] . "</td>";
            echo "<td>" . $row['UserName'] . "</td>";
            echo "<td>" . $row['Zone'] . "</td>";
            echo "<td>" . $row['DateOfBooking'] . "</td>";
            echo "<td>" . $row['NumberOfSeats'] . "</td>";
            echo "<td> <form action='' method='post'><button name='approve_btn' value='".$row['Booking_ID']."' type='submit'>Approove</button></form></td>";
            echo "</tr>";        
        }  
   echo "</table>";              
  
?>


<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      
      if(isset($_POST['approve_btn']))
      {
        include 'connection.php';
        $booking_id = $_POST['approve_btn'];
        $sql = "UPDATE booking SET Approved =1  where Booking_ID = ".$booking_id;
        $result= mysqli_query($con,$sql);
        if ($result)
        {
            echo '<script>alert("APPROVED OK !!!!!")</script>';
            header("Location: http://localhost/resit/approval.php");
            exit;            
            
        }
        else
        {
            die(mysqli_error($con));
        }


//κανουμε μια δοκιμη να δουμε οτι δουλευει 
        /*
        if(!empty($_POST['booking_id'])) 
         {
            echo '3'; 
         }\
         */
    
       }
    }
?>




<br>
<br>
</body>
</html>


