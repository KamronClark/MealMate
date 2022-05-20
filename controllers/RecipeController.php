<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

include 'php/Library.php';
require_once 'php/ConnectVars.php';
require_once 'php/AppVars.php';

// This controller is repsonsible for all operations relating to recipes.
class RecipeController extends Controller {

    // Displays the submitRecipe page.
    public function submitRecipeGET() {
        $this->view('submitRecipe', []);
    }

    // Inserts a valid recipe into the database. Queries that recipe and passes the data to the view recipe page.
    public function submitRecipePOST() {
        $log = QuickLogger::GetInstance();
        
        $recipe = $this->model('Recipe');
        
        // Convert the categories from an array to a comma separated string.
        $commaSeparatedCategories = implode(', ', $_POST["categories"]);

        try {
            $recipe->setTitle($_POST["title"]);
            $recipe->setIngredients($_POST["ingredients"]);
            $recipe->setTools($_POST["tools"]);
            $recipe->setPrepTime($_POST["prepTime"]);
            $recipe->setCookTime($_POST["cookTime"]);
            $recipe->setServings($_POST["servings"]);
            $recipe->setCalories($_POST["calories"]);
            $recipe->setSteps($_POST["steps"]);
            $recipe->setCategories($commaSeparatedCategories);
            $recipe->setImage($_FILES['image']['name'], $_FILES['image']['type']);
        } 
        catch (InvalidArgumentException $ex) {
            $this->view('submitRecipe', ['error' => $ex->getMessage()]);
        }

        // Set the target directory for images.
        $target = MM_UPLADPATH . $recipe->getImage();

        // Move the file to the images directory.
        try
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }    

        $query = "INSERT INTO mm_post (title, ingredients, prep_time, cook_time, servings, tools, recipe_steps, categories, calories, image, author_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try
        {
            // Prepare the query to protect against SQL injection.
            $this->dbc->prepare($query)->execute([$recipe->getTitle(), $recipe->getIngredients(), $recipe->getPrepTime(), $recipe->getCookTime(),$recipe->getServings(), $recipe->getTools(), $recipe->getSteps(), $recipe->getCategories(), $recipe->getCalories(), $recipe->getImage(), $_SESSION["MMLoggedInUserID"]]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        // Get the post id.
        $selectQuery = "SELECT id FROM mm_post WHERE title = ? AND recipe_steps = ? AND author_id = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $result = $this->dbc->prepare($selectQuery);
            // This is the best way I have to find a unique row when what I need to find is the id.
            $result->execute([$recipe->getTitle(), $recipe->getSteps(),  $_SESSION["MMLoggedInUserID"]]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->viewRecipeGET([$row["id"]]);
    }

    // Displays the viewRecipe page using the passed-in id parameter.
    public function viewRecipeGET($params) {
        // $params[0] = recipeID

        $recipeID = $params[0];

        $log = QuickLogger::GetInstance();

        // Get the post.
        $selectQuery = "SELECT * FROM mm_post WHERE id = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $result = $this->dbc->prepare($selectQuery);
            // This is the best way I have to find a unique row when what I need to find is the id.
            $result->execute([$recipeID]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Set variables to the column values to pass to the view.
        $id = $row["id"];
        $title = $row["title"];
        $ingredients = $row["ingredients"];
        $prepTime = $row["prep_time"];
        $cookTime = $row["cook_time"];
        $servings = $row["servings"];
        $tools = $row["tools"];
        $steps = $row["recipe_steps"];
        $categories = $row["categories"];
        $calories = $row["calories"];
        $image = $row["image"];
        $datePosted = $row["date_posted"];
        $authorID = $row["author_id"];

        // Get the user info.
        $selectQuery = "SELECT username, profile_picture FROM mm_user WHERE id = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $userResult = $this->dbc->prepare($selectQuery);
            // This is the best way I have to find a unique row when what I need to find is the id.
            $userResult->execute([$authorID]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $userRow = $userResult->fetch(PDO::FETCH_ASSOC);

        $username = $userRow["username"];
        $profilePicture = $userRow["profile_picture"];

        $this->view('viewRecipe', ["id" => $id, "title" => $title, "ingredients" => $ingredients, "prepTime" => $prepTime, "cookTime" => $cookTime, 
        "servings" => $servings, "tools" => $tools, "steps" => $steps, "categories" => $categories, "calories" => $calories, "image" => $image, "datePosted" => 
        $datePosted, "authorID" => $authorID, "username" => $username, "profilePicture" => $profilePicture]);
    }

    // Displays the recipe list page.
    public function recipeListGET() {
        $log = QuickLogger::GetInstance();

        // Get the posts.
        $selectQuery = "SELECT * FROM mm_post WHERE is_deleted = 0 AND is_approved = 1 ORDER BY date_posted LIMIT 15";

        try
        {
            $result = $this->dbc->query($selectQuery);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $this->view('recipeList', ['recipes' => $result]);
    }

    // Displays the admin page.
    public function admin($params) {
        $log = QuickLogger::GetInstance();

        // Get the posts.
        $selectQuery = "SELECT * FROM mm_post WHERE is_deleted = 0";

        try
        {
            $result = $this->dbc->query($selectQuery);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        if ($params[0] == "deleteSuccessful") {
            $this->view('admin', ['recipes' => $result, 'deleteSuccessful' => $params[0]]);
        } else {
            $this->view('admin', ['recipes' => $result]);
        }
    }

    // Approves a post given a passed-in post id parameter.
    public function approvePost($params) {
        // $params[0] = post id.
        $postID = $params[0];

        $log = QuickLogger::GetInstance();
        
        try
        {
            $this->dbc->query('UPDATE mm_post SET is_approved = 1 WHERE id = ' . $postID . '')->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }
        $this->admin(["approved"]);
    }

    // Denies a post given a passed-in post id parameter.
    public function denyPost($params) {
        // $params[0] = post id.
        $postID = $params[0];
        
        $log = QuickLogger::GetInstance();
        
        try
        {
            $this->dbc->query('UPDATE mm_post SET is_approved = 0 WHERE id = ' . $postID . '')->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }
        $this->admin(["Denied"]);
    }

    // Displays the confirmDelete page given a passed-in post id parameter.
    public function deletePostGET($postID) {
        $log = QuickLogger::GetInstance();

        try
        {
            $post = $this->dbc->query('SELECT * FROM mm_post WHERE id=' . $postID[0] . '')->fetch(PDO::FETCH_ASSOC);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $title = $post['title'];
        $date = $post['date_posted'];
        $steps = $post['recipe_steps'];

        $this->view('confirmDelete', ['title' => $title, 'date' => $date, 'steps' => $steps, 'id' => $postID[0]]);
    }

    // Deletes a post given a passed-in post id parameter.
    public function deletePostPOST($postID) {
        $log = QuickLogger::GetInstance();

        try
        {
            $this->dbc->query('UPDATE mm_post SET is_deleted = 1 WHERE id=' . $postID[0] . '')->fetch(PDO::FETCH_ASSOC);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $this->admin(["deleteSuccessful"]);
    }
}
?>