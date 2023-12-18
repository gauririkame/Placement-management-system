<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("error detected" . mysqli_connect_error());
}
// } else {
//     echo "connection established successfully ";
// }
echo "<br>";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Uname = $_POST["Uname"];
    $Pass = $_POST["Pass"];
   

    // $exists = false;

    // checking credentials
    $sql="select * from clglog where Uname='$Uname' AND Pass='$Pass' ";

    $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if ($num==1)
    {
        echo "Youre logged in !!";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['Uname'] = $Uname;
        header("location:clg_dash.php");


    }
    else
    {
        echo "password invalid !!";
    }
} 


?>



<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" href="./clg_log.css">
    
</head>
<body>
    <h1>College Login </h1><br>
    <div class="login">
        <form action="/pms_final/clg_log.php" method="post" id="login">
            <label><b>User Name</b></label>           
            <input type="text" name="Uname" id="Uname" placeholder="Username">
            <br><br>
            <label><b>Password</b></label>            
            <input type="Password" name="Pass" id="Pass" placeholder="Password">
            <br><br>
            <!--<b><input type="button" name="log" id="log" value="LOGIN"></b>-->  
            <!-- <a href="./clg_dash.html" class="btn">Login</a>  -->
            <button type="submit" class="btn" id="btn">Login</button>         
            <br><br>            
        </form>
    </div>
</body>
</html>






















