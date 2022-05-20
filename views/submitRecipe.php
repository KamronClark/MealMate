<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgDarkText">
    <head>
        <?php
        require_once 'views/head.php';     
        ?>
        <!-- Theme included stylesheets -->
        <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">       
        <!-- Main Quill library -->
        <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <title>Create Blog Post</title>
  </head>       
<body class="mainbgDarkText">
<?php
    require_once 'views/navbar.php';
?>

<div class="container-fluid">

<form id="submitRecipeForm" enctype="multipart/form-data" class="p-2 mx-auto bg-light" method="post" action="RecipeController/submitRecipePOST/">
        <h2>Submit a recipe</h2>
        <h4>make sure to <a style="text-decoration:none" class="mainText" href=<?php echo '"HomeController/help"'?>>check out our help page before you post</a>. Posts in the wrong format will not be approved!</h4>
        <p class="text-danger">* required fields.</p>

        <fieldset class="text-start">
            <div class="form-floating">
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" onblur= "ValidateTextInput('title', 'titleInvalid', 1, 180)" required value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" />
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <div class="invalid" id="titleInvalid">Invalid input</div>
            </div>
            <p>Ingredients <span class="text-danger">*</span></p>
            <div id="ingredientsEditor" class="text-center">
                <p><?php if (isset($_POST['ingredients'])) 
                            {echo $_POST['ingredients'];} ?></p>
            </div>
            <div>
                <input type="hidden" class="form-control" id="ingredients" placeholder="ingredients" name="ingredients" onblur= "ValidateRichTextInput('ingredients', 'ingredientsInvalid', 20, 60000)" required value="<?php if (isset($_POST['ingredients'])) echo $_POST['ingredients']; ?>" />           
                <div class="invalid" id="ingredientsInvalid">Invalid input</div>
            </div>
            <p>Tools <span class="text-danger">*</span></p>
            <div id="toolsEditor" class="text-center">
                <p><?php if (isset($_POST['tools'])) 
                            {echo $_POST['tools'];} ?></p>
            </div>
            <div>
                <input type="hidden" class="form-control" id="tools" placeholder="tools" name="tools" onblur= "ValidateRichTextInput('tools', 'toolsInvalid', 20, 60000)" required value="<?php if (isset($_POST['tools'])) echo $_POST['tools']; ?>" />           
                <div class="invalid" id="toolsInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="prepTime" placeholder="Prep Time" name="prepTime" onblur= "ValidateNumberInput('prepTime', 'prepTimeInvalid', 10, 720)" required value="<?php if (isset($_POST['prepTime'])) echo $_POST['prepTime']; ?>" />
                <label for="prepTime" class="form-label"> Est. Prep Time <span class="text-danger">*</span></label>
                <div class="invalid" id="prepTimeInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="cookTime" placeholder="Cook Time" name="cookTime" onblur= "ValidateNumberInput('cookTime', 'cookTimeInvalid', 10, 720)" required value="<?php if (isset($_POST['cookTime'])) echo $_POST['cookTime']; ?>" />
                <label for="cookTime" class="form-label">Est. Cook Time <span class="text-danger">*</span></label>
                <div class="invalid" id="cookTimeInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="servings" placeholder="Servings" name="servings" onblur= "ValidateNumberInput('servings', 'servingsInvalid', 1, 50)" required value="<?php if (isset($_POST['servings'])) echo $_POST['servings']; ?>" />
                <label for="servings" class="form-label">Est. Servings <span class="text-danger">*</span></label>
                <div class="invalid" id="servingsInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="calories" placeholder="Calories" name="calories" onblur= "ValidateNumberInput('calories', 'caloriesInvalid', 1, 20000)" required value="<?php if (isset($_POST['calories'])) echo $_POST['calories']; ?>" />
                <label for="calories" class="form-label">Est. Calories <span class="text-danger">*</span></label>
                <div class="invalid" id="caloriesInvalid">Invalid input</div>
            </div>
            <p>Steps <span class="text-danger">*</span></p>
            <div id="stepsEditor" class="text-center">
                <p><?php if (isset($_POST['steps'])) 
                            {echo $_POST['steps'];} ?></p>
            </div>
            <div>
                <input type="hidden" class="form-control" id="steps" placeholder="steps" name="steps" onblur= "ValidateRichTextInput('steps', 'stepsInvalid', 20, 60000)" required value="<?php if (isset($_POST['steps'])) echo $_POST['steps']; ?>" />           
                <div class="invalid" id="stepsInvalid">Invalid input</div>
            </div>
            <div>
                <label for="categories[]" class="form-label">Categories (select all that apply) <span class="text-danger">*</span></label>
                <select class="form-control" id="categories[]" placeholder="Categories" name="categories[]" multiple required value="<?php if (isset($_POST['categories'])) echo $_POST['categories']; ?>">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Basic">Basic</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Easy Cleanup">Easy Cleanup</option>
                    <option value="Diet">Diet</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Vegan">Vegan</option>
                </select>              
                <div class="invalid" id="servingsInvalid">Invalid input</div>
            </div>
            <div class="text-start">
              <label class="form-label" for="image">Image of completed dish <br /></label>
              <input type="file" class="form-control" id="image" placeholder="Image of completed dish" name="image" />              
              <div class="invalid" id="imageInvalid">Invalid input</div>
            </div>
          </fieldset>
          <button type="button" class="btn contrastbgLightText" id="submit" onclick="SubmitRecipeForm('submitRecipeForm', 'formSendInvalid')">Submit</button>
          <button type="button" class="btn contrastbgLightText" id="reset" onclick="ResetForm('submitRecipeForm')">Reset</button>
          <br />
          <br />
          <h1 class="mx-auto invalid text-center" id="formSendInvalid">Please fill out all fields.</h1>
      </form>
</div>

<!-- Initialize Quill editor -->
<script>
    // Quill editor for the ingredients input.
    var quill = new Quill('#ingredientsEditor', {
        modules: {
            toolbar: [
            [{ font: [] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script:  "sub" }, { script:  "super" }],
            ["blockquote", "code-block"],
            [{ list:  "ordered" }, { list:  "bullet" }],
            [{ indent:  "-1" }, { indent:  "+1" }, { align: [] }],
            ["link"],
            ["clean"],
            ]
        },     
        theme: "snow"
    });

    // query the input element
    let inputElement = document.getElementById('ingredients')
    quill.on('text-change', function() {
    // sets the value of the hidden input to the editor content.
    inputElement.value = quill.root.innerHTML
    // Run validation.
    ValidateRichTextInput('ingredients', 'ingredientsInvalid', 20, 60000)

});

// Quill editor for the tools input.
var quill1 = new Quill('#toolsEditor', {
        modules: {
            toolbar: [
            [{ font: [] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script:  "sub" }, { script:  "super" }],
            ["blockquote", "code-block"],
            [{ list:  "ordered" }, { list:  "bullet" }],
            [{ indent:  "-1" }, { indent:  "+1" }, { align: [] }],
            ["link"],
            ["clean"],
            ]
        },     
        theme: "snow"
    });

    // query the input element
    let inputElement1 = document.getElementById('tools')
    quill1.on('text-change', function() {
    // sets the value of the hidden input to the editor content.
    inputElement1.value = quill1.root.innerHTML
    // Run validation.
    ValidateRichTextInput('tools', 'toolsInvalid', 20, 60000)

});

    // Quill editor for the steps input.
    var quill2 = new Quill('#stepsEditor', {
        modules: {
            toolbar: [
            [{ font: [] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script:  "sub" }, { script:  "super" }],
            ["blockquote", "code-block"],
            [{ list:  "ordered" }, { list:  "bullet" }],
            [{ indent:  "-1" }, { indent:  "+1" }, { align: [] }],
            ["link"],
            ["clean"],
            ]
        },     
        theme: "snow"
    });

    // query the input element
    let inputElement2 = document.getElementById('steps')
    quill2.on('text-change', function() {
    // sets the value of the hidden input to the editor content.
    inputElement2.value = quill2.root.innerHTML
    // Run validation.
    ValidateRichTextInput('steps', 'stepsInvalid', 20, 60000)

});
</script>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
    
</body>
</html>