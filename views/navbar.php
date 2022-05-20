<?php
if(!isset($_SESSION)) { 
  session_start(); 
} 
?>
<header>
        <nav class="navbar navbar-dark navbar-expand-md mainbgDarkText">
            <div class="container-fluid">
              <a class="navbar-brand" href="HomeController/index">
                <img src="Images/MealMateCropped.png" alt="logo" style="max-width:150px;max-height:150px;" />              
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav fs-4">
                  <li class="nav-item">
                    <a class="nav-link me-3" href="HomeController/index" style="color: #f0f0f0">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-3" href="HomeController/about" style="color: #f0f0f0">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-3" href="HomeController/help" style="color: #f0f0f0">Help</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-3" href="RecipeController/recipeListGET" style="color: #f0f0f0">Recipes</a>
                  </li>
                  <?php
                    if (isset($_SESSION["MMLoggedInUserID"])) {                   
                  ?>
                  <li class="nav-item">
                    <a class="nav-link me-3" href="RecipeController/submitRecipeGET" style="color: #f0f0f0">Post Recipe</a>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
                <ul class="navbar-nav ms-auto fs-4">                  
                  <?php
                    if (isset($_SESSION["MMLoggedInUserID"])) { 
                      if ($_SESSION["MMisAdmin"] == 1) {
                  ?>
                        <li class="nav-item">
                        <a class="nav-link me-3" href="RecipeController/admin/none" style="color: #f0f0f0">Admin</a>
                        </li>
                  <?php
                      }                  
                  ?>
                  <li class="nav-item">
                    <a class="nav-link me-3" href=<?php echo '"UserController/viewProfileGET/' . $_SESSION["MMLoggedInUserID"] . '"'?> style="color: #f0f0f0">View Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="UserController/logout" style="color: #f0f0f0">Logout</a>
                  </li>
                  <?php
                    }
                    if (!isset($_SESSION["MMLoggedInUserID"])) {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="UserController/createProfileGET" style="color: #f0f0f0">Create Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="UserController/loginGET" style="color: #f0f0f0">Login</a>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
            </div>
          </nav>
    </header>