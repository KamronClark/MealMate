<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgLightText">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title><?php echo $data["title"]; ?></title>
  </head>          
<body class="mainbgLightText">
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid mainbgLightText" style="margin-bottom:100px;">
    <div class="row mx-auto mainbgLightText w-100">
        <div class="col-md-12">
        <img src=<?php 
                if ($data["image"] != null) {
                    echo '"Images/' . $data["image"] . '"'; 
                } else {
                    echo '"Images/foodImagePlaceholder.png"';
                }               
                ?> class="img-fluid rounded" alt="Food Image" />
        </div>
    </div>
    <div class="row mainbgLightText mx-auto w-100">
        <div class="col-md-12">
            <h1 class="display-1 text-light"><?php echo $data["title"]; ?></h1>
            <a href=<?php echo '"UserController/viewProfileGET/' . $data["authorID"] . '"'?> style="text-decoration:none;color:white;">
                <div id="viaUser" class="mainbgLightText">
                <img src=<?php 
                if ($data["profilePicture"] != null) {
                    echo '"Images/' . $data["profilePicture"] . '"'; 
                } else {
                    echo '"Images/profilePicturePlaceholder.png"';
                }               
                ?> class="mb-4 mt-4 img-fluid rounded-circle border border-5 border-light" alt="Profile Picture" style="max-height:200px;max-width:200px;" />
                    <h1 class="mx-auto">Recipe via <?php echo $data["username"] ?></h1>
                    <h5 class="mx-auto">Posted: <?php echo $data["datePosted"] ?></h5>
                </div>
            </a>
        </div>
    </div>
    <div class="row w-85 mx-auto mt-5 mainbgLightText mb-5">
        <div class="col-md-4 text-center mainBorder bg-light">
            <h2 class="mainText">Ingredients:</h2>
            <div id="ingredients" class="text-dark">
            <?php echo $data["ingredients"] ?>
            </div>
        </div>
        <div class="col-md-4 text-center mainBorder bg-light">
            <h2 class="mainText">Tools Used:</h2>
            <div id="tools" class="text-dark">
            <?php echo $data["tools"] ?>
            </div>
        </div>
        <div class="col-md-4 text-center mainBorder bg-light">
            <h3 class="text-dark"><span class="mainText">Prep: </span><?php echo $data["prepTime"] ?> min</h3>
            <h3 class="text-dark"><span class="mainText">Cook: </span><?php echo $data["cookTime"] ?> min</h3>
            <h3 class="text-dark"><span class="mainText">Servings: </span><?php echo $data["servings"] ?></h3>
            <h3 class="text-dark"><span class="mainText">Calories: </span><?php echo $data["calories"] ?></h3>
        </div>
    </div>
    <div class="row mx-auto w-90 bg-light text-dark mb-5">
        <div class="col-md-12 steps text-start">
            <hr />
            <p class="steps text-dark">
                <?php echo $data["steps"] ?>
            </p>
            <hr />
        </div>
    </div>
    <div class="row mx-auto w-75 mainbgLightText mt-5">
        <div class="col-md-12">
            <h1 class="categories text-light">
                <?php echo $data["categories"] ?>
            </h1>
        </div>
    </div>
</div>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
