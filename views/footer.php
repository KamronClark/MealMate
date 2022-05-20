<section class="mainbgLightText mt-5 pt-5">
  <!-- Footer -->
  <footer class="text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-6 mb-md-0 text-start align-items-start" style="margin-bottom:150px;">
          <h5 class="text-uppercase mb-2 w-75">
            <!--<img src="Images/MealMateCropped.png" alt="logo" class="mx-auto img-fluid rounded mt-5" style="max-height:140px;" />-->
            Meal Mate
          </h5>

          <p>
            Welcome to Meal Mate, the free online cookbook!
            Check out some recipes or create a profile and submit your own.
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-12 mb-6 mb-md-0 align-items-center">
          <h5 class="text-uppercase">General Links</h5>

          <ul class="list-unstyled navbar-nav mb-0">                 
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
          </ul>
          </div>
          <div class="col-lg-3 col-md-12 mb-6 mb-md-0 align-items-center">
          <h5 class="text-uppercase">User Links</h5>
              <ul class="list-unstyled navbar-nav mb-0">                           
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
                    <a class="nav-link me-3" href="RecipeController/submitRecipeGET" style="color: #f0f0f0">Post Recipe</a>
                  </li>
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
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 darkbgLightText">
      © 2022 Copyright: Anyone can cook!
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>