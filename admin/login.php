<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />
    <title>Login - Food Order System</title>
</head>

<body>

    <div class="login ms-depth-16">

        <h1 class="text-center">Login</h1>
        <br /><br />
        
        <?php 
        
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        
        ?>
        <br /><br />

        <form action="" method="POST" class="text-center">
            Username:
            <br />
            <input class="ms-depth-16" type="text" name="username" placeholder="Enter Username" />
            <br /><br />
            Password:
            <br />
            <input class="ms-depth-16" type="password" name="password" placeholder="Enter Password" />
            <br /><br />
            <input type="submit" name="submit" value="Login" class="btn-primary" />
            <br /><br />
        </form>


        <!--Login form ends here-->

        <p class="text-center">Created by - <a href="https://github.com/Mohammed-Sibahi">Mohammed Sibahi</a></p>
    </div>

</body>

</html>

<?php
// check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // process for login
    // 1. Get the data from the login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
}
// 2. sql to check whether the user and username and password exist
$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ";

// 3. execute the query 

$res = mysqli_query($conn, $sql);

// 4. count rows to check whether the user exists or not 

$count = mysqli_num_rows($res);


if ($count == 1) {
    // user is available and login success
    $_SESSION['login'] = "<div class='success text-center'>Login successful!</div>";
    // redirect to homepage / dashboard 
    header('location' . SITEURL . 'admin/');
} else {
    //user not available and login fail
    $_SESSION['login'] = "<div class='error text-center'>Login failed! Username or password did not match!</div>";

    // redirect to homepage / dashboard 
    header('location' . SITEURL . 'admin/login.php');
}

?>