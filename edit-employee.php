<?php
include './connection.php';

//get url data into id variable
$id = $_GET['eid'];
//fetch data
$selectq = mysqli_query($connection,"select * from employee where emp_id = '{$id}'");

//if id isn't set redirect to display page
if(!isset($_GET['eid'])){
    //header() php
    header('location:display-employee.php');
}

//fetch data
$row = mysqli_fetch_array($selectq);

//Updata data
if($_POST){
    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $mobile = $_POST['txt3'];

    //update query
    $uq = mysqli_query($connection, "update employee set emp_name='{$name}', emp_gender='{$gender}', emp_mobile='{$mobile}' where emp_id='{$id}'");
    if($uq){
        //window js
        echo "<script>alert('Record Updated');window.location='display-employee.php'</script>";
    }
}


?>
<html>
    <body>
        <form method="post">
            Name : <input type="text" value="<?php echo $row['emp_name']; ?>" name = "txt1" placeholder="Enter Name" required />
            Gender : <input type="text" value="<?php echo $row['emp_gender']; ?>" name="txt2" placeholder="Enter Gender"required />
            Mobile : <input type="text" value="<?php echo $row['emp_mobile']; ?>" name="txt3" placeholder="Enter Number" required />
            <input type="submit" value="Update" />
        </form>
    </body>
</html>