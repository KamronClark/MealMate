// Takes an array of words, and concatenates them together to form a sentence.
function ConcatArrayOfWords(array) {
    let result = "";
    
    if (Array.isArray(array) && typeof array[0] == "string") {

        for (let x = 0; x < array.length; x++) {
            result += array[x] + " ";
        }

        result = result.trim();

    } else {
        result = "Parameter must be an array of type string."
    }

    return result;
}

// Takes an array of words, reverses them, and concatenates them together to form a sentence.
function ConcatAndReverseArrayOfWords(array) {
    let result = "";

    if (Array.isArray(array) && typeof array[0] == "string") {

        for (let x = array.length - 1; x >= 0; x--) {
            result += array[x] + " ";
        }

        result = result.trim();

    } else {
        result = "Parameter must be an array of type string."
    }

    return result;
}

// Checks to see if a word exists within a sentence.
function CheckForWordInSentence(sentence, word) {
    let s = sentence.split(" ");

    for (let temp = 0; temp < s.length; temp++) {

        
        if (s[temp] == (word)) {
            return true;
        }
    }
    return false;
}

// Tests if the input parameter is of the type of the type parameter.
function ValidateInputIsSpecifiedType(input, type) {
    let result;

    switch (type) {
        case "string":
            if (typeof input == "string") {
                result = true;
            } else {
                result = false;
            }
            break;

        case "number":
            if (typeof input == "number") {
                result = true;
            } else {
                result = false;
            }
            break;

        case "boolean":
            if (typeof input == "boolean") {
                result = true;
            } else {
                result = false;
            }
            break;

        case "undefined":
            if (typeof input == "undefined") {
                result = true;
            } else {
                result = false;
            }
            break;

        default:
            result = "Possible values for the type parameter include: string, number, boolean, undefined";
            break;
    }

    return result;
}

// Returns the sum of an array of numbers passed-in.
function AddArrayOfNumbers(numbers) {
    let result = 0;


    for (let i = 0; i < numbers.length; i++) {
        result += numbers[i];
    }

    if (typeof numbers === 'string' || numbers instanceof String) {
        result = false;
   
    }

    return result;
    
}

// Gets a random whole number between 0 and the number passed in (maxNumber).
function GetRandomInteger(maxNumber) {
    let result;
    let minNumber = 1;
    if ((Math.random() * maxNumber) + 1 > minNumber) {


        result = true;
    }
    else {
        result = "Please enter a number greater than 1";
    }

    return result;
}

// Validates a date input field
function ValidateDateInput(input, invalid) {
    let result;
    let dateInput = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let oldestDate = 1900;
    let dateArray = dateInput.split("-");

    let date = Date.parse(dateInput);
    let validDate = parseInt(dateArray[0]);

    if (validDate > oldestDate && date < Date.now()) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    } else {
        result = false;
        invalidMessage.innerHTML = "Date must be between 1900 and today";
        invalidMessage.style.visibility = "visible";
    }

    return result;
}

// Validate a user is over 18 years old given a birthdate.
function ValidateOver18(input, invalid) {
    let result;
    let birthdate = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let dateArray = birthdate.split("-");

    let birthdateObject = new Date(Number(dateArray[0]), Number(dateArray[1]), Number(dateArray[2]));

    // find the date 18 years ago
    let date18YearsAgo = new Date();
    date18YearsAgo.setFullYear(date18YearsAgo.getFullYear() - 18);

    if (birthdateObject <= date18YearsAgo) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    } else {
        result = false;
        invalidMessage.innerHTML = "You must be at least 18 years old to use this site";
        invalidMessage.style.visibility = "visible";
    }

    return result;
}

// Validates a selection list input field
function ValidateSelectList(input, invalid) {
    let result;
    let selected = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let noInput = "---";

    if (selected != noInput) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    } else {
        result = false;
        invalidMessage.innerHTML = "Please select an option";
        invalidMessage.style.visibility = "visible";
    }

    return result;
}

// Validates a name input.
function ValidateNameInput(input, invalid) {
    let regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    let name = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let result;
    if (regName.test(name)) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    }
    else {
        result = false;
        invalidMessage.style.visibility = "visible";
    }
    return result;
}

// Validates a rich text format.
function ValidateRichTextInput(input, invalid, minLength, maxLength) {
    let text = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let result = false;
    text = text.trim();

    // I would like to make this a switch statement, but to do so, I would need to make my own functions with different return types. 
    if (text == "" || text == null)
    {
        invalidMessage.innerHTML = "Field must not be blank";
        invalidMessage.style.visibility = "visible";
    }
    else if (text.length < minLength)
    {
        invalidMessage.innerHTML = "Response must contain more than " + minLength + " Character(s)";
        invalidMessage.style.visibility = "visible";
    }
    else if (text.length > maxLength)
    {
        invalidMessage.innerHTML = "Response must contain less than " + maxLength + " Character(s)";
        invalidMessage.style.visibility = "visible";
    }
    else
    {
        result = true
        invalidMessage.style.visibility = "hidden";
    }

    return result;
}

// Validates a text input.
function ValidateTextInput(input, invalid, minLength, maxLength) {
    let text = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let result = false;
    let badCharacters = ["\'", ";", "\"", "\\", "--"];
    text = text.trim();

    // I would like to make this a switch statement, but to do so, I would need to make my own functions with different return types. 
    if (text == "" || text == null)
    {
        invalidMessage.innerHTML = "Field must not be blank";
        invalidMessage.style.visibility = "visible";
    }
    else if (text.length < minLength)
    {
        invalidMessage.innerHTML = "Response must contain more than " + minLength + " Character(s)";
        invalidMessage.style.visibility = "visible";
    }
    else if (text.length > maxLength)
    {
        invalidMessage.innerHTML = "Response must contain less than " + maxLength + " Character(s)";
        invalidMessage.style.visibility = "visible";
    }
    else if (badCharacters.some(bc => text.includes(bc)))
    {
        invalidMessage.innerHTML = "Response must not contain the following characters: <br /> Apostrophe: ( \' ) <br /> Semicolon: ( ; ) <br /> Quotes: ( \" ) <br /> Backslash: ( \\ ) <br /> Hyphens: ( -- )";
        invalidMessage.style.visibility = "visible";
    }
    else
    {
        result = true
        invalidMessage.style.visibility = "hidden";
    }

    return result;
}

// Validates radio inputs.
function ValidateRadioInput(input, invalid) {
    let buttons = document.getElementsByClassName(input);
    let invalidMessage = document.getElementById(invalid);
    let result = false;

    let i = 0;
    while (!result && i < buttons.length) {
        if (buttons[i].checked) {
            result = true;
            i++;
        }
    }

    if (result) {
        invalidMessage.style.visibility = "hidden";
    }
    else {
        invalidMessage.style.visibility = "visible";
    }
    return result;
}

// Validates a phone number.
function ValidatePhoneNumber(input, invalid) {
    let phonenum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let phone = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    let result;

    if (phonenum.test(phone)) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    }
    else {
        result = false;
        invalidMessage.style.visibility = "visible";
    }
    return result;
}

// Validates a number (inclusive).
function ValidateNumberInput(input, invalid, min, max) {
    let result;
    let minNumber = min;
    let maxNumber = max;
    let number = document.getElementById(input).value;
    let invalidMessage = document.getElementById(invalid);
    number = number.trim();

    if (number == "" || number == null)
    {
        result = false;
        invalidMessage.innerHTML = "Field must not be blank";
        invalidMessage.style.visibility = "visible";
    }

    else if (Number(number) >= minNumber && Number(number) <= maxNumber) {
        result = true;
        invalidMessage.style.visibility = "hidden";
    }
    else {
        result = false;
        invalidMessage.innerHTML = "Number must be between " + minNumber + " And " + maxNumber;
        invalidMessage.style.visibility = "visible";
    }
    return result;
}

function ValidateFormSubmit(action, valid, invalid) {
    let result;
    let submitMessage = document.getElementById(action);

    if (ValidateNameInput('name', 'textInvalid') && ValidateDateInput('birthDate', 'dateInvalid') && ValidatePhoneNumber('phoneNumber', 'phoneInvalid')
     && ValidateSelectList('state', 'stateInvalid') && ValidateNumberInput('number', 'numberInvalid')) {
        result = true;
        submitMessage.innerHTML = valid;
        submitMessage.style.color = "Black";
        // Clear form
    } else {
        result = false;
        submitMessage.innerHTML = invalid;
        submitMessage.style.color = "Red";
    }

    submitMessage.style.visibility = "visible";

    return result;
}

function ResetForm(formId) {
    HTMLFormElement.prototype.reset.call(document.getElementById(formId));

    invalidMessages = document.getElementsByClassName("invalid");

    for (let i = 0; i < invalidMessages.length; i++) {
        invalidMessages[i].style.visibility = "hidden";
    }
}