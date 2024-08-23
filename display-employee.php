<script>
    function confirmDelete(){
        return confirm("Are you Sure ?");
    }
</script>

<?php
//database_connection
// $connection = mysqli_connect("localhost:3307","root","","mydb1");
include './connection.php';

//delete data from did
if(isset($_GET['did'])){
    $did = $_GET['did'];
    //delete query
    $dq = mysqli_query($connection, "delete from employee where emp_id = '{$did}' ");
    if($dq){
        echo "<script>alert('Record Deleted');</script>";   
    } 
}

//select query
$q = mysqli_query($connection,"select * from employee");

//mysqli_fetch_row it will fetch data as Numerical Array:
/*
$row = mysqli_fetch_row($q);
print_r($row);
echo $row[0].$row[1].$row[2].$row[3];
*/

//mysqli_fetch_array will fetch data as Numerical and Associative Array
/*
$row = mysqli_fetch_array($q);
print_r($row);
echo $row[0].$row[1].$row[2].$row[3];
echo $row['emp_id'].$row['emp_name'].$row['emp_gender'].$row['emp_mobile'];
*/


//count record 
$count = mysqli_num_rows($q);
echo "$count Records Found";

//display data dynamic into user

//show data in tabular form
echo "<table border='1'>";
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Mobile</th>";
        echo "<th>Action</th>";
    echo "</tr>";
while($row = mysqli_fetch_array($q)){
    echo "<tr>";
        echo "<td>{$row['emp_id']}</td>";
        echo "<td>{$row['emp_name']}</td>";
        echo "<td>{$row['emp_gender']}</td>";
        echo "<td>{$row['emp_mobile']}</td>";
        echo "<td><a href='edit-employee.php?eid={$row['emp_id']}'>Edit</a> 
        |<a href='display-employee.php?did={$row['emp_id']}' onclick = 'return confirmDelete()' > Delete</a> </td>";
    echo "</tr>";
}
echo "</table>";
?>