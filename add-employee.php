<?php
// db connection
// $connection = mysqli_connect("localhost:3307", "root", "", "mydb1");
include './connection.php';

// Check connection
// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

//sql static query for insert data
// $q = mysqli_query($connection,"insert into employee(emp_name, emp_gender, emp_mobile) 
// values('Rahul','Male','9876543210')");

// if($q){
//     echo "Record Added";
// }
if($_POST){
    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $mobile = $_POST['txt3'];
    $q = mysqli_query($connection,"insert into employee(emp_name, emp_gender, emp_mobile) 
    values('{$name}','{$gender}','{$mobile}')");
    if($q){
        echo "<script>alert('Record Added');</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
            Name : <input type="text" name = "txt1" placeholder="Enter Name" required />
            Gender : <input type="text" name="txt2" placeholder="Enter Gender"required />
            Mobile : <input type="text" name="txt3" placeholder="Enter Number" required />
            <input type="submit" value="Add" />
        </form>
    </body>
</html>