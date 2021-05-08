<?php 

//include constants.php file here
include ('../config/constants.php');

// 1. Get the id of admin ot be deleted 
$id = $_GET['id'];
//2.  create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// Execute the query 
$res = mysqli_query($conn, $sql);

// check whether the query is executed successfully or not 
if ($res == true) {
    // Query executed successfully 
    // echo "Admin Deleted";
    // create session variable ot display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    // redirect to manage admin page
    header ('location:'.SITEURL.'admin/manage-admin.php');

} else {
    // failed to delete admin 
// echo "Failed ot Delete Admin";
$_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again later!</div>";
    // redirect to manage admin page
    header ('location:'.SITEURL.'admin/manage-admin.php');

}
// 3. redirect to manage admin page with message (success/error)

?>