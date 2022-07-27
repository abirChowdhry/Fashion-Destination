<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product List</title>
	<link rel="stylesheet" type="text/css" href="liststyle.css">
</head>
<body>
    
    <div class="main">
    <div style="text-align:center">  
    <h1>Products</h1>
    </div>

	<?php 

	error_reporting(0);

           $servername = "localhost";
           $username = "root";
           $password = "";
           $database = "sellers";

           $conn = new mysqli($servername, $username, $password, $database);

           if ($conn->connect_error) 
           {
              die("Connection failed: " . $conn->connect_error);
           }

		$sql = "SELECT * FROM product";
        $result = $conn->query($sql);

           if ($result->num_rows == 0) 
           {
             echo "No Records Found!";
           } 

		else {

			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Type</th>";
			echo "<th>Color</th>";
			echo "<th>Size</th>";
			echo "<th>Price</th>";
			echo "<th>Operations</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			while ($data = mysqli_fetch_assoc($result)) 
			{
			echo "<tr>";
			echo "<td>". $data[id] ."</td>";
			echo "<td>". $data[type] ."</td>";
			echo "<td>". $data[color] ."</td>";
			echo "<td>". $data[size] ."</td>";
			echo "<td>". $data[price] ."</td>";
			echo "<td>" . "<a href='ProductUpdate.php?id=" . $data[id] . "'>Update</a>" . "|" . "<a href='ProductDelete.php?id=" . $data[id] . "'>Delete</a>" . "</td>";
			echo "</tr>";
			}

			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>
	<a href="../Controller/SellerHomePage.php"><button>Go Back</button></a>
	<br><br>
</div>

</body>
</html>

<?php  include('../Views/footer.php')  ?>