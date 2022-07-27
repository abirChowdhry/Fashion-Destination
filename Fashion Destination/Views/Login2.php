
<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login Page</title>
     <link rel="stylesheet" type="text/css" href="loginstyle.css">      
   </head>
   <body>

      <?php
session_start();
$msg="";
if(isset($_POST['submit'])){

    function test($data) {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $username = test($_POST['username']);
            $pass = test($_POST['pass']);


        $usernameerr = $passerr = "";


        if(empty($_POST["username"])){
        $usernameerr = "Username Required!";
        echo $usernameerr;
        }

        else if(empty($_POST["pass"])){
        $passerr = "Password Required!";
        echo $passerr;
        }

        else{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sellers";

     $conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $username = $_POST["username"];
            $pass = $_POST["pass"];

$sql = "SELECT * FROM seller where username = '$username' and password = '$pass'";
$result = $conn->query($sql);

   if($result->num_rows == 1){
      if(isset($_POST['remember'])){
         setcookie('username',$username,time()+60*60*24*365);
         setcookie('password',$password,time()+60*60*24*365);
      }else{
         setcookie('username',$username,30);
         setcookie('password',$password,30);
      }
    $_SESSION['IS_LOGIN']='yes';
    header('location:SellerHomePage.php');
    die();

   }else{
      $msg="Please enter valid login details";
      echo $msg;
   }
}

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

   <h1> Login </h1>
   <form method= "post" onsubmit="return validate()">

<input type="text" placeholder = "Username" id = "username" name="username" value="<?php echo $username_cookie?>">

    <br><br>

    <input type="password" placeholder = "Password" id = "pass" name="pass" value="<?php echo $password_cookie?>">
    <br><br>
    
    <button type="submit" name="submit">Login</button>

    <br>

    <input type="checkbox" id = "remember" name= "remember" class="check-box" <?php echo $set_remember?>><span>Remember me</span>

   <br><br>
   <a href="../Views/SellerRegistration.html">Registration</a>
   <a href="../Controller/HomePage.php">Home</a>
   </form>

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
   </body>
</html>