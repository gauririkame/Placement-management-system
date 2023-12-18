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
    $CPass = $_POST["CPass"];

    //$exists = false;
    $checkUsernameQuery = "SELECT * FROM `signin` WHERE `Uname` = '$Uname'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different username.";
    } elseif ($Pass == $CPass) {
        // Insert the new user into the table
        $sql = "INSERT INTO `signin` (`Uname`, `Pass`) VALUES ('$Uname', '$Pass')";
        $result = mysqli_query($conn, $sql);
    }
        elseif ($result) {
            echo "Your data is submitted successfully";
        }else

    //insert into table
    if (($Pass == $CPass) && $exists == false) {
        $sql = "INSERT INTO `signin` (`Uname`, `Pass`) VALUES ('$Uname', '$Pass')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Your data is submitted successfully";
        }
    } else {
        echo "Password is not match";
    }

}
?>





<!DOCTYPE html>
<html>

<head>
    <title>Login </title>

    <link rel="stylesheet" href="stu_signin.css">


<body>
    <h1>Student SignIN </h1><br>
    <div class="login" id="login">
        <!-- <form action="/learn/signin.php" method="post"> -->
        <form action="/pms_final/stu_signin.php" method="post">
            <label><b>User Name</b></label>
            <input type="text" name="Uname" id="Uname" placeholder="Username" required>
            <br><br>
            <label><b>Password</b></label>
            <input type="password" name="Pass" id="Pass" placeholder="Password" required>
            <br><br>
            </label>
            <label><b> confirm Password</b></label>
            <input type="password" name="CPass" id="CPass" placeholder="renter Password" required>

            <br><br>
            <div class="button container" id="button container">
                <b>
                    <button type="submit" class="btn" id="btn">Sign-In</button>
                </b>

                <b>
                    <a href="stu_log.php" class="btn2" id="btn2">Login</a>
                </b>
                <br><br><br><br>
                <!-- <h6 style="color: red"> if already signin then Login with your credentials</h6> -->
            </div>




        </form>
    </div>


</body>

</html>