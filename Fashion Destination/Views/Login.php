<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <!-- <script src="a.js"></script> -->
</head>
<body>

<?php
session_start();

$username_cookie='';
$password_cookie='';
$set_remember="";
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
   $username_cookie=$_COOKIE['username'];
   $password_cookie=$_COOKIE['password'];
   $set_remember="checked='checked'";  
}
?>
   <div class="main">

<!--       <div class="navigation">
   <li><a href="../Views/SellerRegistration.html">Registration</a></li>
   <li><a href="../Controller/HomePage.php">Home</a></li>
      </div> -->

           <!--  <div class="navigation-bar">
                <nav>
                    <ul id='MenuItems'>
   <li><a href="../Views/SellerRegistration.html">Registration</a></li>
   <li><a href="../Controller/HomePage.php">Home</a></li>
                    </ul>
                </nav>
            </div> -->

   <h1> Login </h1>

	<form action="../Controller/LoginAction.php" method= "post" novalidate onsubmit="return validate()">

    <input type="text" id = "username" placeholder="Username" name="username" value="<?php if(isset($_COOKIE['username'])){ echo $username_cookie;};?>">
    <span id="err1"></span>

    <br><br>

    <input type="password" id = "pass" placeholder="Password" name="pass" value="<?php if(isset($_COOKIE['pass'])){ echo $password_cookie;};?>">
    <span id="err2"></span>
    <br><br>
    
    <button type="submit" name="submit">Login</button>

    <br>

    <input type="checkbox" name= "remember" class="check-box" value="<?php echo $set_remember;?>"><span>Remember me</span>

   <br><br>
   <a href="../Views/SellerRegistration.html">Registration</a>
   <a href="../Controller/HomePage.php">Home</a> 

</form>

<!--    <a href="../Views/SellerRegistration.html"><button>Registration</button></a>
   <a href="../Controller/HomePage.php"><button>Home</button></a> -->
   
    <script>
     function validate()
     {
       var username=document.getElementById('username');
       var password=document.getElementById('pass');
       if(username.value.trim()=="" || password.value.trim()=="")
       {
          alert('Fill all the fields');
          return false;
       }
       else
          return true;
     }
   </script>

</div>

<!--     <script>
     function validate()
     {
       var username=document.getElementById('username');
       var password=document.getElementById('pass');
       if(username.value.trim()=="" || password.value.trim()=="")
       {
          alert('Fill all the fields');
          return false;
       }
       else
          return true;
     }
   </script> -->

</body>
</html>

<?php  include('../Views/footer.php')  ?>
