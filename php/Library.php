<?php
// Sanitizes an input for a mysqli connection.
function SanitizeInput(mysqli $connection, string $input) {
    return mysqli_real_escape_string($connection, trim($input));
}
?>