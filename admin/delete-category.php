<?php
// include the constants file
include('../config/constants.php');

//check whether the id and image_name value are set or not
if (isset($_GET['id']) && isset($_GET['image_name'])) {

    // get the value and delete
    // echo "Get value and delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

// remove the physical image file if available
if ($image_name!= "") {
    
    // image is available, so remove it
    
    $path = "../images/category/".$image_name;
    
    // remove the image

    $remove = unlink($path);

            // if failed to remove the image, then show an error message and stop the process
    if ($remove == false) {

// set the session message
$_SESSION['remove'] = "<div class='error'>Failed to remove category image</div>";

// redirect to manage-category page
header('location:'.SITEURL.'admin/manage-category.php');
// stop the process
die ();

    }

}
// delete data from the database

//redirect to manage-category page with message

} else {

    // redirect to manage-category page
    header('location:' . SITEURL . 'admin/manage-category.php');
}
