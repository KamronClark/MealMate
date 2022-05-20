<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - About</title>
  </head>     

<body>
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid bg-light mt-5 mb-5" style="margin-bottom:100px;">
    <img src="Images/MealMate.png" alt="logo" class="mx-auto img-fluid rounded mt-5" style="max-height:400px;" />
    <h1 class="display-1 mx-auto mainText">About Us</h1>
    <hr />
    <div class="row mt-5 mb-5 bg-light">
        <div class="col-md-6">
            <img src="Images/about1.jpg" alt="About Image" class="mx-auto img-fluid rounded" />
        </div>
        <div class="col-md-6 text-start text-dark mt-5">
            <h4>Welcome to Meal Mate, the online cookbook for a modern age! Here at Meal Mate, our most cherished belief is that anyone can cook. 
                Through providing a space for aspiring foodies to view and share recipes, we hope to bring the joy of cooking to as many people as possible.</h4>
        </div>
    </div>
    <div class="row mt-5 mb-5 mainbgLightText">
        <div class="col-md-6 text-start mt-5">
            <h4>Meal Mate started as just a section in the Stevens Point morning paper. Now through the power of the internet we've expanded it to be worldwide! 
                Our eventual goal is to crowdsource the biggest collection of recipes the internet can offer. Make your profile and fire up the stove to become part of the movement!</h4>
        </div>
        <div class="col-md-6">
            <img src="Images/about2.jpg" alt="About Image" class="mx-auto img-fluid rounded" />
        </div>
    </div>
</div> 
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
