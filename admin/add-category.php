<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br /> <br />

        <?php

        if (isset($_SESSION['add'])) {
            
            echo $_SESSION['add'];
            
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            
            echo $_SESSION['upload'];
            
            unset($_SESSION['upload']);
        }

        ?>

        <br /><br />


        <!--Add Category Form Starts Here-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Category Title" /></td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
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

            // check whether the image is selected and set the value for image name accordingly

            // print_r($_FILES['image']);

            //die(); // break the code here

            if (isset($_FILES['image']['name'])) {
                // upload the image
                // to upload the image, we need image name, source path and destination path
                $image_name = $_FILES['image']['name'];

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/".$image_name;
                //upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                // check whether the image is uploaded or not
                // and if the image is not uploaded then we'll stop the process and redirect with error message
                if ($upload == false) {
                    // set message

                    $_SESSION['upload'] = "<div class='error'>Failed to Upload the Image</div>";

                    // redirect to add category page
                    header('location:' . SITEURL . 'admin/add-category.php');

                    // stop the process
                    die();
                }
            } else {

                // don't upload the image and set the image name value as blank
                $image_name = "";
            }



            //2. Create SQL query to insert categories into database
            $sql = "INSERT INTO tbl_category SET 
            
            title = '$title',

           image_name = '$image_name',

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


<?php include('partials/footer.php'); ?>