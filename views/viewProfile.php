<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Profile</title>
  </head>          
<body>
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid" style="margin-bottom:100px;">
    <div class="row mb-5 mainbgLightText">
        <div class="col-md-10">
            <div class="text-start ms-5">
                <img src=<?php 
                if ($data["profilePicture"] != null) {
                    echo '"Images/' . $data["profilePicture"] . '"'; 
                } else {
                    echo '"Images/profilePicturePlaceholder.png"';
                }               
                ?> class="ms-2 mb-4 mt-4 img-fluid rounded-circle border border-5 border-light" alt="Profile Picture" style="max-height:250px;max-width:250px;" />
                <h1 class="d-inline ms-3 align-self-baseline text-light"><?php echo $data["username"] ?></h1>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class="display-1 mb-5 mainText"><?php echo $data["username"] ?>'s Recipes:</h1>
            <?php
                foreach ($data["recipes"] as $row) {
            ?>
                <div class="card mx-auto mb-3" style="width: 30rem;">
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
