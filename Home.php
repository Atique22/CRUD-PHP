<!DOCTYPE html>
<html lang="en">

        <head>
            <meta cha$et="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        
            <title> PHP - CRUD</title>
        </head>
<body>
    
        <div class="container px-24 py-24 mx-auto sm:mr-5 p-5 flex float-left">
          <div class="lg:w-2/5 md:w-1/2 bg-white rounded-lg p-8 flex flex-col shadow-lg border border-gray-300">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">CRUD-Opeators!</h2>

            
        <form action="crud.php" method="post">
            <div class="relative mb-4">
              <label for="rid" class="leading-7 text-sm text-gray-600">Reg. ID</label>
              <input type="text" id="rid" name="rid" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
              <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="uname" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="uname" name="uname" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
              <input type="tel" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            <button name="create" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
          </form>



          </div >
            <div class="lg:w-3/6 mx-auto overflow-auto float-right">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Reg. ID</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Phone</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Updata</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        $con = mysqli_connect("localhost","root","","crud-php");
                      if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        die();
                    }
                  $result = mysqli_query($con,"SELECT * FROM `registration`");
                  while($row = mysqli_fetch_assoc($result)){
                  ?>
                      <tr>
                                  <td class="pr-1 py-2"><?php echo $row['Reg_id']?>  </td>
                                  <td class="pl-1 py-2"><?php echo $row['Name']?>    </td>
                                  <td class="pl-2 py-2"><?php echo $row['Email']?>   </td>
                                  <td class="pl-2 py-2"><?php echo $row['Phone']?> </td>
                                  
                                  <!-- <td class="px-4 py-3 text-green-600">Updata</td> -->
                                  <!-- <td class="px-4 py-3 text-red-600">Delete</td> -->
                                  <td class="px-4 py-3 text-green-600"><a href="crud.php?edit=<?php echo $row['Reg_id']; ?>" ><button name='Updata' type="button" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded">
                                  Updata</button></a></td> <td class="px-4 py-3 text-red-600"><a href="crud.php?Remove=<?php echo $row['Reg_id']; ?>" ><button name='Delete' type="button" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-4 border border-red-500 hover:border-transparent rounded">
                                  Delete</button></a></td>
                                  
                          </tr>

                  <?php
                      }
                  ?>
                </tbody>
              </table>
          </div>
        </div>
</body>
</html>