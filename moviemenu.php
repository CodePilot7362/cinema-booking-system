<?php
    include 'checksession.php';
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MovieMenu</title>
</head>
<body>
    <h2>Welcome to our page!! <br>Please pick what <br> movie you want to enjoy!</h2>
    <form action="" method="post">
        <select id="movie" name="movie" required>
            <?php
            include 'connection.php'; 
            $query = "SELECT * FROM `movies`";
            $result = mysqli_query($con, $query);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['Movie_ID']."'>".$row['Movie_Name']."</option>";
            }
            ?>   
        </select>

        <label for="rdate">Date:</label>
        <input type="date" id="rdate" name="rdate" required>

        <label for="rzone">Timezone:</label>
        <select id="rzone" name="rzone" required>
            <option value="" disabled selected>Choose timezone</option>
            <option value="A">Zone A</option>
            <option value="B">Zone B</option>
            <option value="C">Zone C</option>
        </select>

        <label for="seats">Number of seats:</label>
        <input type="number" id="seats" name="seats" placeholder="Enter number of seats" required>

        <input type="submit" name="submit" value="Choose options">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['movie'])) {
                $movie_id = $_POST['movie'];
                $current_user = $_SESSION['username_session'];
                $zone = $_POST['rzone'];
                $date = $_POST['rdate'];
                $seats = $_POST['seats'];
                include 'connection.php';
                $sql = "INSERT INTO `booking`( `Movie_ID`, `UserName`, `Zone`, `DateOfBooking`, `NumberOfSeats`, `Approved`) VALUES ('$movie_id','$current_user','$zone','$date','$seats',0)";
                $result= mysqli_query($con, $sql);
                if ($result) {
                    echo '<script>alert("Your reservation completed successfully")</script>';
                    header("Location: http://localhost/resit/end.php");
                    exit; 
                } else {
                    die(mysqli_error($con));
                }
                // κανουμ ενα τεστ
                //DEBUG VALUES
                //echo 'You have chosen: ' . $movie_id.'   user: '.$current_user.'   zone: '.$zone.'   date: '.$date.'  seats: '.$seats;
            } else {
                echo 'Please select the value.';
            }
        }
    }
    ?>

</body>
</html>
