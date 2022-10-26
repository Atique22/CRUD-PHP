
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



//delete data 
    else if(isset($_GET['Remove']))
    {
       $sql_s = "DELETE FROM `registration` WHERE `Reg_id` = '" . $_GET["Remove"] . "'";
       
       if (mysqli_query($conn, $sql_s)) {
            echo "Record deleted successfully";
            header("Location: Home.php");
        } 
    }



// editor data 
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET["edit"];
    $data =  "SELECT * FROM registration WHERE `Reg_id` = '" . $_GET["edit"] . "'";
    $record = mysqli_query($conn, $data);
    // echo "access editeable: ".$id;

    if (mysqli_query($conn, $data)) {
        $n = mysqli_fetch_array($record);

            $RegID = $n['Reg_id'];
            $NAME = $n['Name'];
            $EMAIL = $n['Email'];
            $PHONE = $n['Phone'];

            //echo "access editeable data: ".$RegID;
            // header('location: Home.php');
    }
    else{
        echo"error occurs";
    }
}
//updata
if (isset($_POST['update'])) {
    echo "<br> update successfully connection! <br>";
    $RegID = $_POST['rid'];
    $NAME = $_POST['uname'];
    $EMAIL = $_POST['email'];
    $PHONE = $_POST['phone'];
    //`registration`(`Reg_id`, `Name`, `Email`, `Phone`) VALUES ('$RegID','$NAME','$EMAIL','$PHONE')
  mysqli_query($conn, "UPDATE `registration` SET `Reg_id`='$RegID',`Name`='$NAME',`Email`='$EMAIL',`Phone`='$PHONE' WHERE `Reg_id`='$RegID'");
  header('location: Home.php');
  }


//create data
    else if (isset($_POST['create']))
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
                 			header("Location: Home.php");
                			die;
                        }
                        else {
                            
                            echo '<script>alert("Errors!")</script>';
                            echo "Error: " . $msg . "<br>" . $conn->error;}
             }

        }
?>




      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
       <title> Update - CRUD</title>
      <div class="container px-24 py-24 mx-auto sm:mr-5 p-5 flex float-left">
          <div class="lg:w-2/5 md:w-1/2 bg-white rounded-lg p-8 flex flex-col shadow-lg border border-gray-300">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Update-Opeators!</h2>


        <form action="crud.php" method="post">
            <div class="relative mb-4">
              <label for="rid" class="leading-7 text-sm text-gray-600">Reg. ID</label>
              <input type="text" id="rid" name="rid" value="<?php echo $RegID; ?>" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
              <input type="email" id="email" name="email" value="<?php echo $EMAIL; ?>" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="uname" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="uname" name="uname" value="<?php echo $NAME; ?>" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
              <input type="tel" id="phone" name="phone" value="<?php echo $PHONE; ?>" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            <button name="update" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
          </form>
          </div>
      </div>

      <!-- <script>
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
      </script> -->