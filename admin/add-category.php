<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br /> <br />

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <br /><br />
        

        <!--Add Category Form Starts Here-->
        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Category Title" /></td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" />Yes
                        <input type="radio" name="featured" value="No" />No
                    </td>

                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" />Yes
                        <input type="radio" name="active" value="No" />No

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary" />
                    </td>

                </tr>
            </table>


        </form>
        <!--Add Category Form Ends Here-->
        <?php
        // check whether the submit button is clicked or not
        if (isset($_POST['submit'])) {
            // echo "clicked";

            //1. Get the Value from Category Form
            $title = $_POST['title'];

            // For radio input, we need to check whether the button is selected or not
            if (isset($_POST['featured'])) {
                // Get the value from form
                $featured = $_POST['featured'];
            } else {

                // Set the default value
                $featured = $_POST['No'];
            }

            if (isset($_POST['active'])) {

                $active = $_POST['active'];
            } else {

                $active = $_POST['No'];
            }
            //2. Create SQL query to insert categories into database
            $sql = "INSERT INTO tbl_category SET 
            title = '$title',
            featured = '$featured',
            active = '$active'
            
            ";
            //3. execute the query and save in database
            $res = mysqli_query($conn, $sql);

            //4. Check whether the query is executed or not and data added or not
            if ($res == true) {

                // Query executed and category added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";

                // redirect to manage category page
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                // Failed to add category

                $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";

                // redirect to add category page
                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }

        ?>


    </div>

</div>


<?php
include('partials/footer.php');
?>