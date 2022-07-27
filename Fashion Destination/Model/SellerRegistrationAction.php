<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seller Registration</title>
</head>
<body>
	
    <?php
    
    session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test($_POST['fname']);
			$lname = test($_POST['lname']);
			$username = test($_POST['username']);
			$pass = test($_POST['pass']);
			$conpass = test($_POST['conpass']);


		$fnameerr = $lnameerr = $usernameerr = $passerr = $conpasserr = $matcherr = "";


        if (empty($_POST["fname"])) {
        $fnameerr = "First Name Required!";
        echo $fnameerr;
        }

		else if (empty($_POST["lname"])) {
		$lnameerr = "Last Name Required!";
		echo $lnameerr;
		}

	    else if(empty($_POST["username"])){
	    $usernameerr = "Username Required!";
	    echo $usernameerr;
		}

	    else if(empty($_POST["pass"])){
	    $passerr = "Password Required!";
	    echo $passerr;
		}

	    else if(empty($_POST["conpass"])){
	    $conpasserr = "Confirm Password Required!";
	    echo $conpasserr;
		}

	    else if(($_POST["conpass"]) !== ($_POST["pass"])){
	    $matcherr = "Password & Confirm Password Doesn't Match!";
	    echo $matcherr;
		}

			else 
			
			{ 

		   $servername = "localhost";
           $username = "root";
           $password = "";
           $database = "sellers";

           $conn = new mysqli($servername, $username, $password, $database);

           if ($conn->connect_error) 
           {
              die("Connection failed: " . $conn->connect_error);
           }
            
            $firstName = $_POST["fname"];
            $lastName = $_POST["lname"];
            $username = $_POST["username"];
            $pass = $_POST["pass"];

            $sql = "SELECT * FROM seller where username = '$username'";
            $result = $conn->query($sql);

           if ($result->num_rows == 1) 
           {
             echo "Use Different Username... This Username Already Exists!";
           } 

           else
           {

   			$sql1 = "INSERT INTO seller (firstname, lastname, username, password)
            VALUES ('$firstName', '$lastName' , '$username' , '$pass')";

            if ($conn->query($sql1) === TRUE) 
            {
             echo "Registered Successfully";
            }


            else 
            {
             echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
		   }

		   }

		}
		
	    else 
	    {
		echo "No valid request";
	    }
    ?>

  <br><br>
	<a href="../Views/SellerRegistration.html"><button>Go Back</button></a>
	<br><br>


</body>
</html>

<?php  include('../Views/footer.php')  ?>