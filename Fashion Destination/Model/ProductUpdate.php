<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Update</title>
	<link rel="stylesheet" type="text/css" href="liststyle.css">
</head>
<body>

	<?php 
		
    error_reporting(0);

		if (isset($_GET['id'])) 
		{
		   $id = $_GET['id'];

		   $servername = "localhost";
           $username = "root";
           $password = "";
           $database = "sellers";

           $conn = new mysqli($servername, $username, $password, $database);

           if ($conn->connect_error) 
           {
              die("Connection failed: " . $conn->connect_error);
           }

           $sql = "SELECT * FROM product where id = '$id'";
           $result = $conn->query($sql);

			/*for ($i = 0; $i < count($arr1); $i++) {
				if ($id == $arr1[$i]->id) {
					$type = $arr1[$i]->type;
					$color = $arr1[$i]->color;
					$size = $arr1[$i]->size;
					$price = $arr1[$i]->price;
				}*/

				$data = mysqli_fetch_assoc($result);
		}

		else {
			die("Invalid Request");
		}
	?>

    <div class="main">
    <div style="text-align:center">  
	<h1>Product Update</h1>
    </div>

	<form action="ProductUpdateAction.php" method="post" novalidate onsubmit="return validate()">

		<label>Id</label>
		<input type="text" name="id" value="<?php echo $data['id']; ?>" readonly>
		<br><br>

		<label>Type*</label>
		<input type="text" id="type" name="type" value="<?php echo $data['type']; ?>">
		<br><br>

		<label>Color*</label>
		<input type="text" id="color" name="color" value="<?php echo $data['color']; ?>">
		<br><br>

		<label>Size*</label>
		<input type="text" id="size" name="size" value="<?php echo $data['size']; ?>">
		<br><br>

		<label>Price*</label>
		<input type="text" id="price" name="price" value="<?php echo $data['price']; ?>">
		<br><br>

		<input type="submit" value="Update">
		
	</form>

	 <script>
     function validate()
     {
       var type=document.getElementById('type');
       var color=document.getElementById('color');
       var size=document.getElementById('size');
       var price=document.getElementById('price');
       if(type.value.trim()=="" || color.value.trim()=="" || size.value.trim()=="" || price.value.trim()=="")
       {
          alert('Fill all the fields');
          return false;
       }
       else
          return true;
     }
   </script>

	<br><br>
	<a href="../Model/ProductList.php"><button>Go Back</button></a>
	<br><br>
</div>
</body>
</html>
<?php  include('../Views/footer.php')  ?>