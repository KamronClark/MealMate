<?php
// This class represents a user of the Meal Mate site.
class User {
    private $firstName;
    private $lastName;
    private $birthdate;
    private $username;
    private $password;
    private $profilePicture;

    // Gets the user's first name.
    public function getFirstName() {
        return $this->firstName;
    }

    // Sets the user's first name.
    public function setFirstName($firstName) {
        if (strlen($firstName) <= 60) {
            $this->firstName = $firstName;
        } else {
            throw new InvalidArgumentException("First name must contain 180 characters or less.");
        }
    }

    // Gets the user's last name.
    public function getLastName() {
        return $this->lastName;
    }

    // Sets the user's last name.
    public function setLastName($lastName) {
        if (strlen($lastName) <= 60) {
            $this->lastName = $lastName;
        } else {
            throw new InvalidArgumentException("Last name must contain 180 characters or less.");
        }
    }

    // Gets the user's birthdate.
    public function getBirthdate() {
        return $this->birthdate;
    }

    // Sets the user's birthdate.
    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    // Gets the user's username.
    public function getUsername() {
        return $this->username;
    }

    // Sets the user's username.
    public function setUsername($username) {
        if (strlen($username) <= 25) {
            $this->username = $username;
        } else {
            throw new InvalidArgumentException("Username must contain 25 characters or less.");
        }
    }

    // Gets the user's password.
    public function getPassword() {
        return $this->password;
    }

    // Sets the user's password.
    public function setPassword($password) {
        if (strlen($password) <= 40) {
            $this->password = $password;
        } else {
            throw new InvalidArgumentException("Password must contain 40 characters or less.");
        }
    }

    // Gets the user's profile picture URL.
    public function getProfilePicture() {
        return $this->profilePicture;
    }

    // Sets the user's profile picture URL.
    public function setProfilePicture($profilePicture, $type) {
        if ($type == 'image/gif' || $type == 'image/jpeg' || $type == 'image/pjpeg' || $type == 'image/png') {
            $this->profilePicture = $profilePicture;
        } else {
            throw new InvalidArgumentException("Profile picture must be an image of type jpg/jpeg, gif, or png.");
        }
    }
}
?>