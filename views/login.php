<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgDarkText">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Login</title>
  </head>     
        
<body class="mainbgDarkText">
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid mb-5 mt-5">

<?php
    if (isset($data['loginFailed'][0])) {
        echo '<div class="mx-auto text-center border border-danger w-75">';
        echo "<h1 class='text-danger'>Login Failed. Username or password is invalid";
        echo '</div>';
    }
?>

<form id="loginForm" enctype="multipart/form-data" class="p-2 mx-auto bg-light mb-5 mt-5" method="post" action="UserController/loginPOST/">
        <h2>Login</h2>

        <fieldset>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" onblur= "ValidateTextInput('username', 'usernameInvalid', 1, 25)" required value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
                <label for="username" class="form-label">Username</label>
                <div class="invalid" id="usernameInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" onblur= "ValidateTextInput('password', 'passwordInvalid', 1, 40)" required value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" />
                <label for="password" class="form-label">Password</label>
                <div class="invalid" id="passwordInvalid">Invalid input</div>
            </div>
          </fieldset>
          <button type="button" class="btn contrastbgLightText" id="submit" onclick="SubmitLoginForm('loginForm', 'formSendInvalid')">Submit</button>
          <button type="button" class="btn contrastbgLightText" id="reset" onclick="ResetForm('loginForm')">Reset</button>
          <br />
          <br />
          <h1 class="mx-auto invalid text-center mb-5" id="formSendInvalid">Please fill out all fields.</h1>
      </form>
</div>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>