<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.html" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php

        // create sql to display categories from database
        $sql = "SELECT * FROM tbl_category WHERE featured='Yes' And active='Yes' LIMIT 3"; // display the first three rows in the db

        // execute the query 
        $res = mysqli_query($conn, $sql);

        // count rows to check whether the category is available or not
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            // categories avialable
            while ($row = mysqli_fetch_assoc($res)) {
                // get the values like title, id, image_name
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];

        ?>

                <a href="category-foods.html">
                    <div class="box-3 float-container">
                        <?php
                        // check whether image is available or not
                        if ($image_name == "") {
                            //display message
                            echo "<div class='error'>Image Not Available</div>";
                        } else {
                            //image is available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                        <?php
                        }

                        ?>

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>

        <?php
            }
        } else {
            // categories are not avialable 
            echo "<div class='error'>Category Not Added</div>";
        }

        ?>








        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->




<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        //getting foods from database that are active and featured

        // sql query
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

        // execute the query 
        $res2 = mysqli_query($conn, $sql2);

        // count rows 
        $count2 = mysqli_num_rows($res2);

        // check whether food is available or not

        if ($count > 0) {

            // food is available
            while ($row = mysqli_fetch_assoc($res2)) {

                // get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">

                        <?php
                        // check whether image is available or not
                        if ($image_name == "") {
                            // image is not available
                            echo "<div class='error'>Image is not available</div>";
                        } else {
                            // image is available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Momo" class="img-responsive img-curve">


                                <!--complete at 1:02:00-->

                        <?php
                        }

                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>


        <?php
            }
        } else {

            // food not available
            echo "<div class='error'>Food is not available</div>";
        }


        ?>





        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php

include('partials-front/footer.php');

?>