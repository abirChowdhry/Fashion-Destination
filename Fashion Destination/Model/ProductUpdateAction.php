<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Update Action</title>
</head>
<body>

	<h1>Product Update</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$id = test($_POST['id']);
			$type = test($_POST['type']);
			$color = test($_POST['color']);
			$size = test($_POST['size']);
			$price = test($_POST['price']);

			if (empty($id) or empty($type) or empty($color) or empty($size) or empty($price)) {
				echo "Please fill up the form properly";
			}
			else {
           $servername = "localhost";
           $username = "root";
           $password = "";
           $database = "sellers";

           $conn = new mysqli($servername, $username, $password, $database);

           if ($conn->connect_error) 
           {
              die("Connection failed: " . $conn->connect_error);
           }
            
            $id = $_POST["id"];
            $type = $_POST["type"];
            $color = $_POST["color"];
            $size = $_POST["size"];
            $price = $_POST["price"];

            $sql1 = "UPDATE product SET type='$type', color='$color', size='$size', price='$price' WHERE id='$id'";

            if ($conn->query($sql1) === TRUE) 
            {
             echo "Updated Successfully";
            }

            else 
            {
             echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
			}
		}
	?>

	<hr><hr>

	<a href="ProductList.php">Product List</a>

</body>
</html>