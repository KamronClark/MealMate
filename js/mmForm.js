// Validates the create profile form.
function SubmitCreateProfileForm(formId, invalid) {
    form = document.getElementById(formId);
    invalidMessage = document.getElementById(invalid);

    if (ValidateTextInput('firstName', 'firstNameInvalid', 1, 60) && ValidateTextInput('lastName', 'lastNameInvalid', 1, 60) && ValidateOver18('birthdate', 'birthdateInvalid')
        && ValidateTextInput('username', 'usernameInvalid', 5, 60) && ValidateTextInput('password', 'passwordInvalid', 8, 50)) {
        HTMLFormElement.prototype.submit.call(form);
    }
    else {
        invalidMessage.style.visibility = "visible";
    }
}

// Validates the login form.
function SubmitLoginForm(formId, invalid) {
    form = document.getElementById(formId);
    invalidMessage = document.getElementById(invalid);

    if (ValidateTextInput('username', 'usernameInvalid', 1, 25) && ValidateTextInput('password', 'passwordInvalid', 1, 40)) {
        HTMLFormElement.prototype.submit.call(form);
    }
    else {
        invalidMessage.style.visibility = "visible";
    }
}

// Validates the submit recipe form.
function SubmitRecipeForm(formId, invalid) {
    form = document.getElementById(formId);
    invalidMessage = document.getElementById(invalid);

    if (ValidateTextInput('title', 'titleInvalid', 1, 180) && ValidateRichTextInput('ingredients', 'ingredientsInvalid', 20, 60000) && ValidateRichTextInput('tools', 'toolsInvalid', 20, 60000)
        && ValidateNumberInput('prepTime', 'prepTimeInvalid', 10, 720) && ValidateNumberInput('cookTime', 'cookTimeInvalid', 10, 720) && ValidateNumberInput('calories', 'caloriesInvalid', 1, 20000)
        && ValidateNumberInput('servings', 'servingsInvalid', 1, 50) && ValidateRichTextInput('steps', 'stepsInvalid', 20, 60000)) {
        HTMLFormElement.prototype.submit.call(form);
    }
    else {
        invalidMessage.style.visibility = "visible";
    }
}

function ValidateCheckBox(checks) {
    let checkBoxes = document.getElementsByClassName(checks);
    let result = false;

    for (i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked) {
            result = true;
            break;
        }
    }

    return result;
}