<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product List Action</title>
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

			$type = test($_POST['type']);
			$color = test($_POST['color']);
			$size = test($_POST['size']);
			$price = test($_POST['price']);


		$typeerr = $colorerr = $sizeerr = $priceerr = "";


        if (empty($_POST["type"])) {
        $typeerr = "Product Type Required!";
        echo $typeerr;
        }

		else if (empty($_POST["color"])) {
		$colorerr = "Product Color Required!";
		echo $colorerr;
		}

	    else if(empty($_POST["size"])){
	    $sizeerr = "Product Size Required!";
	    echo $sizeerr;
		}

	    else if(empty($_POST["price"])){
	    $priceerr = "Product Price Required!";
	    echo $priceerr;
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
            
            $type = $_POST["type"];
            $color = $_POST["color"];
            $size = $_POST["size"];
            $price = $_POST["price"];

            $sql1 = "INSERT INTO product (type, color, size, price)
            VALUES ('$type', '$color' , '$size' , '$price')";

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
		
	    else 
	    {
		echo "No valid request";
	    }
    ?>

    <br><br>
	<a href="../Views/Products.php"><button>Go Back</button></a>
	<br><br>

</body>
</html>