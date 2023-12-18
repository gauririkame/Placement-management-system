<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true) {
    header("location:stu_signin.php");
    exit;

} 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Navbar</title>
    <link rel="stylesheet" href="welcome_stu.css">
</head>

<body>

    <h1 style="text-align: center; color:white;">
        Welcome -
        <?php echo $_SESSION['Uname'] ?>
    </h1>
</body>

</html>

<?php
// --------Database configuration--------------------
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "login";

        // ---------------------------Create a database connection--------------------------
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn)
            {
                die("error detected". mysqli_connect_error());
            }
        //     else{
        //         echo "connection established successfully ";
        //     }
        // echo "<br>";
        // echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $student_id = $_POST["student_id"];
    $branch = $_POST["branch"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_No"];
    $domain = $_POST["domain"];
    $year = $_POST["year"];
    $cgpa = $_POST["cgpa"];

    // ----------------------Handle the CV file upload--------------------------------
    // $cv_filename = $_FILES["CV"]["name"];
    // $cv_tmp_name = $_FILES["CV"]["tmp_name"];
    // $cv_target_dir = "uploads/";
    // $cv_target_path = $cv_target_dir . $cv_filename;

    // if (move_uploaded_file($cv_tmp_name, $cv_target_path)) {
        // CV uploaded successfully

        

        // -------------------------Insert data into the database------------------------------
    $sql = "INSERT INTO `student` (`name`, `student_id`, `branch`, `dob`, `email`, `phone_no`, `domain`, `year`, `cgpa`) 
    VALUES ('$name', '$student_id', '$branch', '$dob', '$email', '$phone_no', '$domain', '$year', '$cgpa')";

    $result = mysqli_query($conn, $sql);

    // Check for form submission
    if($result){
        echo "<div class='alert alert-success alert-dismissible fade show' role='danger'>
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'></span>
        </button>
        </div>";

    }
    else{
        echo "The table was not created successfully because of this error ---> ";
    }
}
// }
?>

<h1 style="color:white"> WE NEED YOUR INFORMATION</h1>
<!-- <h2>FILL THESE</h2> -->
<!DOCTYPE html>
<html>

<head>
  <title>Student Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css">
  <style>
    body {
      font-family: arial;
      transition: all 0.5s ease;
      -webkit-transition: all 0.5s ease;
      background-color:seagreen;
    }

    .container {
      padding: 40px;
      width: 500px;
      margin: 20px auto;
      background-color:#bae0bb;
      color:black;
      border-color: #c9c9c9;
    }

    .container h2 {
      text-align: center;
    }

    fieldset {
      border: 1px solid darkblue;
      padding: 20px 10px;
      margin-bottom: 20px;
      border-radius: 8px;
    
    }

    .input-field {
      display: flex;
      margin-bottom: 15px;
    }

    label {
      margin-right: 25px;
      margin-top: 5px;
      width: 30%;
      text-align: right;
      font-weight: bold;
    }

    .icon {
      background: darkblue;
      color: red;
      min-width: 40px;
      border: 2px solid darkgreen;
      border-right: none;
      text-align: center;
      padding: 7px;
    }

    .inputs {
      padding: 3px 10px;
      border: 2px solid darkgreen;
      width: 70%;
    }

    input [type="radio"] {
      margin-right: 8px;
    }

    .textarea {
      padding: 8px;
      border: 2px solid darkgreen;
    }

    .textarea-icon {
      padding-top: 14px;
    }

    .button {
      text-align: center;
    }

    .submit {
      color: white;
      background: #ee9a25;
      padding: 9px 25px;
      margin-right: 10px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 5px #c9c9c9;
    }

    .submit:hover {
      background: #d1871e;
    }

    .reset {
      color: white;
      background: #c93232;
      padding: 9px 25px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 5px #c9c9c9;
    }

    .reset:hover {
      background: #a32727;
    }

    .city {
      margin-left: -6px;
    }


    .courses {
      margin-left: -26px;
    }

    input[type="radio"] {
      margin-right: 10px;
    }

    .message {
      margin-left: -30px;
    }
    .Student{
      margin-right:50px ;
      margin-left:30px;
      text-align: center;
    }
    
  </style>
</head>

<body>
  <div class="container">
    <h2>Student Details</h2>
    <form action="connect.php" method="POST">
      <fieldset>


        <div class="input-field">
          <label>Name</label>
          
          <input type="text" class="inputs" name="name" required>
        </div>
        <div class="input-field">
          <label>Student id</label>
          <input type="text" class="inputs" name="student_id" required>
        </div>   
        
        <div class="input-field">
          <label class="Branch">branch</label>
          <select id="b" class="inputs"  name="branch" required>
            <option value="0">--select branch--</option>
            <option value="Computer Engg">Computer Engg</option>
            <option value="Computer Science And Design">Computer Science And Design</option>
            <option value="AIDS">AIDS</option>
            <option value="Robotics and Automation">Robotics and Automation</option>
            <option value="Civil">Civil</option>
            <option value="electrical">electrical</option>
            <option value="Electronics">Electronics</option>
          </select>  
        </div>
        <div class="input-field">
          <label>DOB</label>
          <input type="text" class="inputs" name="dob" required>
        </div>
        <div class="input-field">
          <label>Email</label>
          <input type="email" class="inputs" name="email" required>
        </div>
        <div class="input-field">
          <label>Phone No</label>
          <input type="text" class="inputs" name="phone_No" required>
        </div>
      </fieldset>

      <fieldset>
        <div class="input-field">
          <label class="domain">Domain</label>
          <input type="text" class="inputs" name="domain" required>
        </div>
        <div class="input-field">
          <label class="year">year</label>
          
          <select name="year" id="" class="inputs" required>
            <option value="0">Select year</option>
            <option value="1st year"> 1st year</option>
            <option value="2nd year"> 2nd year</option>
            <option value="3rd year"> 3rd year</option>
            <option value="4th year"> 4th year</option>
            
          </select>
        </div>
        <div class="input-field">
          <label>CGPA</label>
          
          <input type="text" class="inputs"  name="cgpa" required>
        </div>
        <!-- cv upload -->
        <!-- <div class="input-field">
          <label>Upload CV</label>
    
          <input type="file" class="inputs" name="CV">
        </div> -->
      </fieldset>

      <div class="button">
        <a href="./stu_log"><button type="submit" class="submit">Submit</button></a>
        
        <button type="reset" class="reset">Reset</button>
      </div>
    </form>
  </div>
</body>

</html>
