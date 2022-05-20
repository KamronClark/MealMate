<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

include 'php/Library.php';
require_once 'php/ConnectVars.php';
require_once 'php/AppVars.php';

// This controller is repsonsible for all operations relating to users.
class UserController extends Controller {

    // Displays the createProfile page.
    public function createProfileGET() {
        $this->view('createProfile', []);
    }

    // Inserts a valid user into the database. Queries that user and passes the data to the view profile page.
    public function createProfilePOST() {
        $log = QuickLogger::GetInstance();
        
        $user = $this->model('User');
        
        try {
            $user->setFirstName($_POST["firstName"]);
            $user->setLastName($_POST["lastName"]);
            $user->setBirthdate($_POST["birthdate"]);
            $user->setUsername($_POST["username"]);
            $user->setPassword($_POST["password"]);
            $user->setProfilePicture($_FILES['profilePicture']['name'], $_FILES['profilePicture']['type']);
        } 
        catch (InvalidArgumentException $ex) {
            $this->view('createProfile', ['error' => $ex->getMessage()]);
        }

        // Set the target directory for images.
        $target = MM_UPLADPATH . $user->getProfilePicture();

        // Move the file to the images directory.
        try
        {
            move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }    

        // This query will be used to check that the username of every user is unique.
        $validateUsername = "SELECT * FROM mm_user WHERE username = ?";
        
        try
        {
            // Prepare the query to protect against SQL injection.
            $validateUsernameResult = $this->dbc->prepare($validateUsername);
            $validateUsernameResult->execute([$user->getUsername()]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        // If the query returns any rows, then the username entered by the user has already been taken.
        if ($validateUsernameResult->rowCount() > 0) {
            $this->view('createProfile', ['error' => "Sorry, that username is taken."]);
        }

        $query = "INSERT INTO mm_user (first_name, last_name, birthdate, username, password, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";

        try
        {
            // Prepare the query to protect against SQL injection. Use password_hash to store an encrypted password using the deafault bcrypt algorthim.
            $this->dbc->prepare($query)->execute([$user->getFirstName(), $user->getLastName(), $user->getBirthdate(), $user->getUsername(), password_hash($user->getPassword(), PASSWORD_DEFAULT), $user->getProfilePicture()]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        // Get the user's id and admin status.
        $selectQuery = "SELECT id, is_admin FROM mm_user WHERE first_name = ? AND last_name = ? AND username = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $result = $this->dbc->prepare($selectQuery);
            $result->execute([$user->getFirstName(), $user->getLastName(),  $user->getUsername()]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Set the user an their permissions.
        $_SESSION["MMLoggedInUserID"] = $row["id"];
        $_SESSION["MMisAdmin"] = $row["is_admin"];

        $this->viewProfileGET([$row["id"]]);
    }

    // Displays the login page.
    public function loginGET() {
        $this->view('login', []);
    }

    // Logs the user in if their username and password is valid.
    public function loginPOST() {
        $log = QuickLogger::GetInstance();

        $selectQuery = "SELECT id, username, password, is_admin FROM mm_user WHERE username = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $result = $this->dbc->prepare($selectQuery);
            $result->execute([$_POST["username"]]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Verify that the username and password match.
        if ($_POST["username"] == $row["username"] && password_verify($_POST["password"], $row["password"])) {
            $_SESSION["MMLoggedInUserID"] = $row["id"];
            $_SESSION["MMisAdmin"] = $row["is_admin"];

            $this->viewProfileGET([$row["id"]]);
        } else {
            $this->view('login', ['loginFailed' => 'failed']);
        }

        
    }

    // Logs out the current user.
    public function logout() {
        $log = QuickLogger::GetInstance();
        
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        // Once again there's some redundancy with the HomeControlled index method here due to the method being in a different controller.
        
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

    // Displays the viewProfile page using the passed-in id parameter.
    public function viewProfileGET($params) {
        // $params[0] = userID

        $userID = $params[0];

        $log = QuickLogger::GetInstance();

        // Get the post.
        $selectQuery = "SELECT * FROM mm_user WHERE id = ?";

        try
        {
            // Prepare the query to protect against SQL injection.
            $userResult = $this->dbc->prepare($selectQuery);
            // This is the best way I have to find a unique row when what I need to find is the id.
            $userResult->execute([$userID]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        $row = $userResult->fetch(PDO::FETCH_ASSOC);

        // Set variables to the column values to pass to the view.
        $id = $row["id"];
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $username = $row["username"];
        $profilePicture = $row["profile_picture"];

        // Get the user info.
        $selectQuery = "SELECT id, title, image, categories FROM mm_post WHERE author_id = ? AND is_approved = 1";

        try
        {
            // Prepare the query to protect against SQL injection.
            $result = $this->dbc->prepare($selectQuery);
            // This is the best way I have to find a unique row when what I need to find is the id.
            $result->execute([$id]);
        }
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }

        //$postRows = $result->fetchAll(PDO::FETCH_BOTH);

        $this->view('viewProfile', ["id" => $id, "firstName" => $firstName, "lastName" => $lastName, "username" => $username, "profilePicture" => $profilePicture, 
        "recipes" => $result]);
    }
}
?>