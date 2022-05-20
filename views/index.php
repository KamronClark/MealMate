<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgLightText">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate</title>
  </head>     

<body class="mainbgLightText">
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid bg-light rounded-3" style="margin-bottom:100px;width:90%;">
    <div class="row">
        <div class="col-md-12">
            <div class="mx-auto text-center mt-5 mb-5 mainText">
                <h1 class="display-1">Welcome to Meal Mate!</h1>
                <h1 class="mainText mx-auto mb-5">Check out this week's featured recipe!</h1>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            <a style="text-decoration:none;" href=<?php echo '"RecipeController/viewRecipeGET/' . $data["id"] . '"'?>>               
                <img src=<?php 
                    if ($data["image"] != null) {
                        echo '"Images/' . $data["image"] . '"'; 
                    } else {
                        echo '"Images/foodImagePlaceholder.png"';
                    }               
                    ?> class="img-fluid rounded" alt="Food Image" />
            </a>
        </div>
        <div class="col-md-4 align-self-center">
                <h2 class="mainText"><?php echo $data["title"] ?></h2>
                <h5 class="mainText">These tasty vegetarian burritos make a great lightweight meal that everyone is sure to love!</h5>           
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mx-auto mb-3" style="width: 23rem;">
                    <img src=<?php 
                    if ($data["image"] != null) {
                        echo '"Images/quickRecipes.jpg"';
                    } else {
                        echo '"Images/foodImagePlaceholder.png"';
                    }                   
                    ?> class="card-img-top" alt="User Recipe"/>
                        <div class="card-body mainbgLightText">
                            <h5 class="card-title">Quick Recipes </h5>
                            <p class="card-text">Short on time? These quick recipes can be ready in a jiffy without sacrificing taste!</p>
                            <a class="btn contrastbgLightText" href=<?php echo '"RecipeController/recipeListGET"' ?>>Check them out</a>
                        </div>
                </div>                
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mx-auto mb-3" style="width: 23rem;">
                    <img src=<?php 
                    if ($data["image"] != null) {
                        echo '"Images/bigMeals.jpg"';
                    } else {
                        echo '"Images/foodImagePlaceholder.png"';
                    }                   
                    ?> class="card-img-top" alt="User Recipe"/>
                        <div class="card-body mainbgLightText">
                            <h5 class="card-title">Big Meals </h5>
                            <p class="card-text">Feeding friends or family? These large recipes yield enough servings to feed a village!</p>
                            <a class="btn contrastbgLightText" href=<?php echo '"RecipeController/recipeListGET"' ?>>Check them out</a>
                        </div>
                </div>                
        </div>
    </div>   
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mx-auto mb-3" style="width: 23rem;">
                    <img src=<?php 
                    if ($data["image"] != null) {
                        echo '"Images/dietMeals.png"';
                    } else {
                        echo '"Images/foodImagePlaceholder.png"';
                    }                   
                    ?> class="card-img-top" alt="User Recipe"/>
                        <div class="card-body mainbgLightText">
                            <h5 class="card-title">Diet Meals </h5>
                            <p class="card-text">Looking for a healthy, fulfilling meal? These diet recipes are low on calories and high on flavor!</p>
                            <a class="btn contrastbgLightText" href=<?php echo '"RecipeController/recipeListGET"' ?>>Check them out</a>
                        </div>
                </div>                
        </div>
    </div>   

</div> 
    
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
