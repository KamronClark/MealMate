<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Help</title>
  </head>     

<body>
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid bg-light mt-5 mb-5" style="margin-bottom:100px;">
    <h1 class="display-1 mx-auto mainText" style="margin-bottom:210px;">This page will show you how to make a beautifully-formatted post so other users can use your recipe!</h1>
    <hr />
    <div class="row mt-5 mb-5 bg-light">
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/TitleHelp.PNG" alt="Title Screenshot" class="mx-auto img-fluid rounded" />
        </div>
        <div class="col-md-6 text-start text-dark mt-5">
            <h1 class="mainText">Step one: Title</h1>
            <h4>Your title can be just about anything you want! Don't overthink it, but try to make it accurate and entising to your fellow users!</h4>
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 mainbgLightText">
        <div class="col-md-6 text-start mt-5">
        <h1 class="text-light">Step two: Ingredients</h1>
            <h4>Next is the ingredients, a very crucial step! Make sure you format them in a bulleted list for the best readability. 
                Try to include as much detail as you can. Remember, we want to make sure everyone can follow our recipes regardless of their cooking experience!</h4>
        </div>
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/IngredientsFormatHelp.PNG" alt="Ingredients Screenshot" class="mx-auto img-fluid rounded" />
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 bg-light">
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/ToolsFormatHelp.PNG" alt="Tools Screenshot" class="mx-auto img-fluid rounded" />
        </div>
        <div class="col-md-6 text-start text-dark mt-5">
        <h1 class="mainText">Step three: Tools</h1>
            <h4>Next we have the tools. Here is where you can list any tools you use in the recipe. Be it pans, spatulas, blenders, anything you used to help 
                make your amazing dish a reality! Make sure to format it as a bulleted list just like the ingredients.
            </h4>
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 mainbgLightText">
        <div class="col-md-6 text-start mt-5">
        <h1 class="text-light">Step four: Time & Nutrition</h1>
            <h4>Next up is the prep time, cook time, servings, and calories. Don't worry too much about getting these exactly right, just make you best estimate.
                These will be used to help other users plan out your recipe!
            </h4>
        </div>
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/NumberHelp.PNG" alt="Numbers Screenshot" class="mx-auto img-fluid rounded" />
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 bg-light">
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/StepsFormatHelp.PNG" alt="Steps Screenshot" class="mx-auto img-fluid rounded" />
        </div>
        <div class="col-md-6 text-start text-dark mt-5">
        <h1 class="mainText">Step five: Directions</h1>
            <h4>Here it is, the most important part! Here you will outline the steps you'll take to cook your delicious dish. Format it such that the step numbers 
                are in size Heading 1, that way other users can see them outlined clearly. Include as much detail as you can to make sure anyone can dive right in!
            </h4>
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 mainbgLightText">
        <div class="col-md-6 text-start mt-5">
        <h1 class="text-light">Step six: Categories</h1>
            <h4>Don't worry, we're almost done! Here are the categories, select every category that applies to your recipe. These categories will help other users find
                the right recipes for them. Whether they're looking for a big meal, a vegan dish, or an easy cleanup, they'll be able to find exactly what their looking for!
            </h4>
        </div>
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/CategoriesHelp.PNG" alt="Categories Screenshot" class="mx-auto mt-3 img-fluid rounded" />
        </div>
    </div>
    <hr />
    <div class="row mt-5 mb-5 bg-light">
        <div class="col-md-6">
            <img src="Images/HelpPageScreenshots/ImageHelp.PNG" alt="Image Screenshot" class="mx-auto img-fluid rounded" />
        </div>
        <div class="col-md-6 text-start text-dark mt-5">
        <h1 class="mainText">Step seven: Photo</h1>
            <h4>And finally, it's time to attach a photo of your beautiful dish! Don't worry if you didn't take one, this is an optional step. If you don't attach an image then
                your recipe will be displayed with a default image, so it'll still be easy to find!
            </h4>
        </div>
    </div>
</div> 
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
