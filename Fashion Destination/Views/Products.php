<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
    <link rel="stylesheet" type="text/css" href="regstyle.css">
</head>
<body>

<div class="main">
<h1> LIST A PRODUCT </h1>

 <form action="../Model/ProductListAction.php" method="post" novalidate onsubmit="return validate()">
        
	<br>

    <label for="type">Product Type*</label>
    <input type="text" id="type" name="type">

    <br><br>

    <label for="color">Color*</label>
    <input type="text" id="color" name="color">

    <br><br>

    <label for="size">Size*</label>
    <input type="text" id="size" name="size">

    <br><br>

    <label for="price">Price*</label>
    <input type="text" id="price" name="price">

    <br><br>

    <div style="text-align:center">  
    <button type="submit" name="submit">Submit</button>
    </div> 

    </form>

    <br>
    <div style="text-align:center">  
    <a href="../Controller/SellerHomePage.php">Home</a>
    </div>
</div>

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

</body>
</html>

<?php  include('../Views/footer.php')  ?>