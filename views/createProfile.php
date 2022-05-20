<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgDarkText">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Create Profile</title>
  </head>           
<body class="mainbgDarkText">
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid" style="margin-bottom:100px;">

<?php
    if (isset($data['error'])) {
        echo '<div class="mx-auto text-center border border-danger w-75" style="margin-bottom:100px;">';
        echo "<h1 class='text-danger'>" . $data['error'] . "</h1>";
        echo '</div>';
    }
?>

<form id="createProfileForm" enctype="multipart/form-data" class="p-2 bg-light mx-auto" method="post" action="UserController/createProfilePOST/">
        <h2>Create a profile</h2>
        <p class="text-danger">* required fields.</p>

        <fieldset>
            <div class="form-floating">
                <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" onblur= "ValidateTextInput('firstName', 'firstNameInvalid', 1, 60)" required value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" />
                <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                <div class="invalid" id="firstNameInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" onblur= "ValidateTextInput('lastName', 'lastNameInvalid', 1, 60)" required value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" />
                <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                <div class="invalid" id="lastNameInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" id="birthdate" placeholder="Birthdate" name="birthdate" onblur= "ValidateOver18('birthdate', 'birthdateInvalid')" required value="<?php if (isset($_POST['birthdate'])) echo $_POST['birthdate']; ?>" />
                <label for="birthdate" class="form-label">Birthdate <span class="text-danger">*</span></label>
                <div class="invalid" id="birthdateInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" onblur= "ValidateTextInput('username', 'usernameInvalid', 5, 60)" required value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <div class="invalid" id="usernameInvalid">Invalid input</div>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" onblur= "ValidateTextInput('password', 'passwordInvalid', 8, 50)" required value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" />
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="invalid" id="passwordInvalid">Invalid input</div>
            </div>
            <div class="text-start">
              <label class="form-label" for="profilePicture">Profile picture <span class="text-danger">*</span> <br /></label>
              <input type="file" class="form-control" id="profilePicture" placeholder="Profile picture" name="profilePicture" required value="<?php if (isset($_FILES['profilePicture'])) echo $_Files['profilePicture']; ?>" />              
              <div class="invalid" id="profilePictureInvalid">Invalid input</div>
            </div>
          </fieldset>
          <button type="button" class="btn contrastbgLightText" id="submit" onclick="SubmitCreateProfileForm('createProfileForm', 'formSendInvalid')">Submit</button>
          <button type="button" class="btn contrastbgLightText" id="reset" onclick="ResetForm('createProfileForm')">Reset</button>
          <br />
          <br />
          <h1 class="mx-auto invalid text-center" id="formSendInvalid">Please fill out all fields.</h1>
      </form>
</div>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
