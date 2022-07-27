<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seller Home Page</title>
	<link rel="stylesheet" type="text/css" href="mainstyle.css"> 
</head>
<body>

<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:LoginAction.php');
	die();
}
?>
	<div class="main">
	<h1><center><b>WELCOME TO THE WORLD OF FASHION</b></center></h1>

    <br><br>
	<a href="../Model/SellerProfile.php"> <button>My Profile</button> </a>
	<a href="../Views/Products.php"> <button>Product Listing</button></a>
	<a href="../Model/ProductList.php"> <button>Product Modification</button> </a>
	<a href="../Views/Search.php"> <button>Search</button> </a>
	<a href="logout.php"><button>Logout</button></a>
   </div>
</body>
</html>

<br>
<?php  include('../Views/footer.php')  ?>