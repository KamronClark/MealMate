<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

// This controller is repsonsible for general operations not relating entirely to user or recipe.
class HomeController extends Controller {

    // Queries data for and displays the index page.
    public function index() {        
        $log = QuickLogger::GetInstance();

        // Get the post.
        $selectQuery = "SELECT * FROM mm_post WHERE id = 1";

        try
        {
            $result = $this->dbc->query($selectQuery);
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

        $this->view('index', ["id" => $id, "title" => $title, "ingredients" => $ingredients, "prepTime" => $prepTime, "cookTime" => $cookTime, 
        "servings" => $servings, "tools" => $tools, "steps" => $steps, "categories" => $categories, "calories" => $calories, "image" => $image, "datePosted" => 
        $datePosted, "authorID" => $authorID]);
    }

    // displays the about page.
    public function about() {
        $this->view('about', []);
    }

    // displays the help page.
    public function help() {
        $this->view('help', []);
    }
}

?>