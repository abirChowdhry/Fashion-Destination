<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Action</title>
</head>
<body>

</body>
</html>

<?php

    session_start();

    if (isset($_POST['submit'])) 
        {

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

if ($result->num_rows == 1) 
{
    if(isset($_POST['remember']))
    {
            setcookie('username',$username,time()+60*60*24*365);
            setcookie('pass',$pass,time()+60*60*24*365);
    }
    else
    {
            setcookie('username',$username,30);
            setcookie('pass',$pass,30);
    }
    
/*    if(!empty($_POST['remember']))
    {
        $remember = $_POST['remember']
        setcookie("username", $username, time()+3600*24*7);
        setcookie("pass", $pass, time()+3600*24*7);
        setcookie("userlogin", $remember, time()+3600*24*7);
    }

    else
    {
        setcookie('username', $username,30);
        setcookie('pass', $pass,30); 
    }*/

    $_SESSION['IS_LOGIN']='yes';
    header('location:SellerHomePage.php');
    die();
} 

else 
{
  echo "Please Enter Correct Username or Password";
}

$conn->close();

}
}

        else 
        {
        echo "No valid request";
        }

/*$username_cookie='';
$password_cookie='';
$set_remember="";
if(isset($_COOKIE['username']) && isset($_COOKIE['pass']))
{
    $username_cookie=$_COOKIE['username'];
    $password_cookie=$_COOKIE['password'];
    $set_remember="checked='checked'";  
}*/

?> 

    <br><br>
    <a href="../Views/Login.php"><button>Go Back</button></a>
    <br><br>

    <?php  include('../Views/footer.php')  ?>