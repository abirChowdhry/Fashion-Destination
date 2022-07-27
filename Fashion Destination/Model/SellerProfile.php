<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seller Profile</title>
</head>
<body>

	<?php

	//include "../Controller/LoginAction.php";

/*		   $servername = "localhost";
           $username = "root";
           $password = "";
           $database = "sellers";

           $conn = new mysqli($servername, $username, $password, $database);

           if ($conn->connect_error) 
           {
              die("Connection failed: " . $conn->connect_error);
           }
            
            $firstName = "fname";
            $lastName = "lname";
            $username = $_POST["username"];
            $pass = $_POST["pass"];

            $sql = "SELECT * FROM seller where username = '$username'";
            $result = $conn->query($sql);

           if ($result->num_rows == 1) 
           {
             echo "First Name: ". $firstName;
             echo "Last Name: ". $lastName;
             echo "Username: ". $username;

           } 
            $conn->close();*/
    ?>

 <p>Name: Abir Chowdhury</p>
 <p>Username: abir</p>

  <br><br>
  <a href="../Controller/SellerHomePage.php"><button>Go Back</button></a>
  <br><br>

</body>
</html>
<!-- <?php  include('../Views/footer.php')  ?> -->