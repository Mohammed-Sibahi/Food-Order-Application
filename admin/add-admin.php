<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br /> <br />

<?php 

if (isset($_SESSION['add'])) {
    echo $_SESSION['add']; // display the session message if set
    unset($_SESSION['add']); // remove the session message
}
?>

        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <td>Password</td>

                <td><input type="password" name="password" placeholder="Enter your password"></td>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php 
// process the value from form and save it in the database.


// check whether the submit button is clicked or not.

if (isset($_POST['submit'])) {
    // button clicked 
   // echo "Button clicked";

   //1.  Get the data from the form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //Password encryption with MD5

    //2. SQL to save the date into the database
$sql = "INSERT INTO tbl_admin SET 

    full_name = '$full_name',
    username = '$username',
    password = '$password'
";

//3. Execute query and save data in the database
$conn = mysqli_connect('localhost', 'root', '') or die (mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error($conn));

$res = mysqli_query($conn, $sql) or die (mysqli_error($conn));

//4. check whether the (query is executed) data is inserted or not

if ($res == TRUE) {
    // data inserted
    // echo "Data inserted";
    // create a session variable to display message 
    $_SESSION['add'] = "Admin Added Successfully";
    // Redirect page to manage admin
    header("location:".SITEURL.'admin/manage-admin.php'); 

} else {
    //failed to insert data
    // echo "Failed to insert data";
 // create a session variable to display message 
 $_SESSION['add'] = "Failed to Add Admin";
 // Redirect page to add admin
 header("location:".SITEURL.'admin/add-admin.php'); 


}

} 

?>