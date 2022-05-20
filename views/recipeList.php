<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Recipes</title>
  </head>           
<body>
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid" style="margin-bottom:100px;">
        <div class="col-md-12">
            <h1 class="display-1 mx-auto mb-5 mainText">Recently Posted Recipes:</h1>
            <?php
                foreach ($data["recipes"] as $row) {
            ?>
                <div class="card mx-auto mb-3" style="width: 23rem;">
                    <img src=<?php 
                    if ($row["title"] != null) {
                        echo '"Images/' . $row["image"] . '"';
                    } else {
                        echo '"Images/foodImagePlaceholder.png"';
                    }                   
                    ?> class="card-img-top" alt="User Recipe">
                    <div class="card-body mainbgLightText">
                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                        <p class="card-text">Categories: <?php echo $row["categories"] ?></p>
                        <a href=<?php echo '"RecipeController/viewRecipeGET/' . $row["id"] . '"'?> class="btn contrastbgLightText">Check it out</a>
                    </div>
                </div>
            <?php
                }
             ?>
        </div>
    </div>
</div>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
