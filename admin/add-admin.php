<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br /> <br />
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

   // Get the data from the form
// complete from 39:27 
// 2. Food Order Website with PHP and MySQL (Add and Display Admins)
} 

?>