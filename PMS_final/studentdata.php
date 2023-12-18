<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- html form for searching table entry by cgpa -->
    <center>
    <form method="GET" action="studentdata.php">
        <label for="search">Search by CGPA:</label>
        <input type="text" id="search" name="cgpa" class="form-control" placeholder="Enter CGPA" style="width:150px;">
        <br>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    </center>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("error detected" . mysqli_connect_error());
}
?>

<?php
if (isset($_GET["delete"])) {
    $student_id = $_GET["delete"];
    // echo "$student_id";
    $sql = "DELETE FROM `student` WHERE `student_id`='$student_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='success'>
        You'r Data is Deleted <strong>Successfully</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'></span>
        </button>
        </div>";
    }



}

$cgpa = isset($_GET["cgpa"]) ? $_GET["cgpa"] : null;

if ($cgpa !== null) {
    // Validate and sanitize the input if needed
    $cgpa = floatval($cgpa);

    $sql = "SELECT * FROM `student` WHERE `cgpa` >= $cgpa";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM `student`";
    $result = mysqli_query($conn, $sql);
}

?>


<!-- table  -->
<!-- <div class="container">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">student_id</th>
                <th scope="col">branch</th>
                <th scope="col">dob</th>
                <th scope="col">email</th>
                <th scope="col">phone_No</th>
                <th scope="col">domain</th>
                <th scope="col">year</th>
                <th scope="col">cgpa</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // $sql = "SELECT * FROM `student`";
            // $result = mysqli_query($conn, $sql);
            // // checking the number of records
            // $num = mysqli_num_rows($result);
            // echo "record found in databse " . $num;
            // echo "<br>";
            // echo "<br>";
            // $sr_no = 0;
            // while ($row = mysqli_fetch_assoc($result)) {



            //     $sr_no = $sr_no + 1;

            //     echo "<tr>
            //         <th>" . $row['name'] . "</th>
            //         <td>" . $row['student_id'] . "</td>
            //         <td>" . $row['branch'] . "</td>
            //         <td>" . $row['dob'] . "</td>
            //         <td>" . $row['email'] . "</td>
            //         <td>" . $row['phone_no'] . "</td>
            //         <td>" . $row['domain'] . "</td>
            //         <td>" . $row['year'] . "</td>
            //         <td>" . $row['cgpa'] . "</td>
            //         <td>
            //         <button class='delete btn btn-sm btn-primary' id=" . $row['student_id'] . ">Delete</button></td>
            //         </tr>";


            // }
            ?>
        </tbody>
    </table> -->
<!-- </div> -->

<div class="container">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">student_id</th>
                <th scope="col">branch</th>
                <th scope="col">dob</th>
                <th scope="col">email</th>
                <th scope="col">phone_No</th>
                <th scope="col">domain</th>
                <th scope="col">year</th>
                <th scope="col">cgpa</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            echo "record found in databse " . $num;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <th>" . $row['name'] . "</th>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['branch'] . "</td>
                    <td>" . $row['dob'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone_no'] . "</td>
                    <td>" . $row['domain'] . "</td>
                    <td>" . $row['year'] . "</td>
                    <td>" . $row['cgpa'] . "</td>
                    <td>
                    <button class='delete btn btn-sm btn-primary' id=" . $row['student_id'] . ">Delete</button></td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css for paging -->
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- external css -->
    <link rel="stylesheet" href="S_data_style.css">

</head>

<body>
    


    <!--jquery for paging-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
        </script>

    <!-- js for paging -->
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



    <!-- data tables for paging -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <!-- js and popper for bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- js for Delete -->
    <script>
        deletes = document.getElementsByClassName('delete'); Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("delete",);


                student_id = e.target.id.substr();
                if (confirm("Are you wanted to delete?")) {
                    console.log("yes");

                    window.location = `studentdata.php?delete=${student_id}`;

                }
                else {
                    console.log("no");
                }
            });
        });
    </script>
</body>

</html>