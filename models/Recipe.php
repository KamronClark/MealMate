<?php
// This class represents a recipe posted on the Meal Mate site.
class Recipe {
    private $title;
    private $ingredients;
    private $prepTime;
    private $cookTime;
    private $servings;
    private $tools;
    private $recipeSteps;
    private $categories;
    private $calories;
    private $image;
    private $datePosted;
    private $authorID;
    private $isApproved;
    private $isDeleted;

    // Gets the title of the recipe post.
    public function getTitle() {
        return $this->title;
    }

    // Sets the title of the recipe post.
    public function setTitle($title) {
        if (strlen($title) <= 180) {
            $this->title = $title;
        } else {
            throw new InvalidArgumentException("Title must contain 180 characters or less.");
        }
    }

    // Gets the recipe ingredients.
    public function getIngredients() {
        return $this->ingredients;
    }

    // Sets the recipe ingredients.
    public function setIngredients($ingredients) {
        $this->ingredients = $ingredients;
    }

    // Gets the prep time of the recipe post.
    public function getPrepTime() {
        return $this->prepTime;
    }

    // Sets the prep time of the recipe post.
    public function setPrepTime($prepTime) {
        if ((int)$prepTime <= 720) {
            $this->prepTime = $prepTime;
        } else {
            throw new InvalidArgumentException("Prep time must be 12 hours or less.");
        }
    }

    // Gets the cook time of the recipe post.
    public function getCookTime() {
        return $this->cookTime;
    }

    // Sets the cook time of the recipe post.
    public function setCookTime($cookTime) {
        if ((int)$cookTime <= 720) {
            $this->cookTime = $cookTime;
        } else {
            throw new InvalidArgumentException("Cook time must be 12 hours or less.");
        }
    }

    // Gets the servings of the recipe post.
    public function getServings() {
        return $this->servings;
    }

    // Sets the servings of the recipe post.
    public function setServings($servings) {
        if ((int)$servings <= 50) {
            $this->servings = $servings;
        } else {
            throw new InvalidArgumentException("Recipe must yield 50 servings or less.");
        }
    }

    // Gets the tools required for the recipe.
    public function getTools() {
        return $this->tools;
    }

    // Sets the tools required for the recipe.
    public function setTools($tools) {
        $this->tools = $tools;
    }

    // Gets the steps of the recipe.
    public function getSteps() {
        return $this->recipeSteps;
    }

    // Sets the steps of the recipe.
    public function setSteps($recipeSteps) {
        $this->recipeSteps = $recipeSteps;
    }

    // Gets the categories of the recipe.
    public function getCategories() {
        return $this->categories;
    }

    // Sets the categories of the recipe.
    public function setCategories($categories) {
        $this->categories = $categories;
    }

    // Gets the calories of the recipe.
    public function getCalories() {
        return $this->calories;
    }

    // Sets the calories of the recipe.
    public function setCalories($calories) {
        if ((int)$calories <= 20000) {
            $this->calories = $calories;
        } else {
            throw new InvalidArgumentException("Recipe must have 20,000 calories or less.");
        }
    }

    // Gets the image of the recipe post.
    public function getImage() {
        return $this->image;
    }

    // Sets the image of the recipe post.
    public function setImage($image) {
        $this->image = $image;
    }

    // Gets the date the recipe was posted.
    public function getDatePosted() {
        return $this->datePosted;
    }

    // Sets the date the recipe was posted.
    public function setDatePosted($datePosted) {
        $this->datePosted = $datePosted;
    }

    // Gets the ID of the author of the recipe.
    public function getAuthorID() {
        return $this->authorID;
    }

    // Sets the ID of the author of the recipe.
    public function setAuthorID($authorID) {
        $this->authorID = $authorID;
    }

    // Gets a value indicating whether the post is approved.
    public function getIsApproved() {
        return $this->isApproved;
    }

    // Sets a value indicating whether the post is approved.
    public function setIsApproved($isApproved) {
        $this->isApproved = $isApproved;
    }

    // Gets a value indicating whether the post is deleted.
    public function getIsDeleted() {
        return $this->isDeleted;
    }

    // Sets a value indicating whether the post is deleted.
    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;
    }
}
?>