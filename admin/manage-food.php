<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

        <!--Button to Add Food-->

        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

        <br /> <br />

        <?php 
        
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        
        ?>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th> Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1. </td>
                <td>Burger King</td>
                <td>$20</td>
                <td>Image</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>

                </td>
            </tr>

           

           
        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>