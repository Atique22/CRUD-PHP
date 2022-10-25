<?php
//error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud-php";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        
        echo '<script>alert("Error connection!")</script>';
      die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['Remove']))
    {
       $sql_s = "DELETE FROM `registration` WHERE `Reg_id` = '" . $_GET["Remove"] . "'";
       
       if (mysqli_query($conn, $sql_s)) {
            echo "Record deleted successfully";
            header("Location: Home.php");
        } 
    }
    else
    {
            echo "<br> successfully connection! <br>";
            $RegID = $_POST['rid'];
            $NAME = $_POST['uname'];
            $EMAIL = $_POST['email'];
            $PHONE = $_POST['phone'];
            if (!empty($NAME) && !empty($EMAIL) &&  !empty($RegID)  &&  !empty($PHONE) ) {
                        $msg = "INSERT INTO `registration`(`Reg_id`, `Name`, `Email`, `Phone`) VALUES ('$RegID','$NAME','$EMAIL','$PHONE')";
                         if ($conn->query($msg) === TRUE) {
                            echo "<br>  created successfully! <br>";
                            echo '<script>alert("created successfully!")</script>';
                			mysqli_query($conn, $msg);
                 			header("Location: Home.html");
                			die;
                        }
                        else {
                            
                            echo '<script>alert("Errors!")</script>';
                            echo "Error: " . $msg . "<br>" . $conn->error;}
             }

        }
?>