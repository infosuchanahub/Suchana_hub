<?php

// Helper functions for Suchana Hub

/**
 * Get the current date and time in UTC.
 * @return string Formatted date and time in YYYY-MM-DD HH:MM:SS.
 */
function get_current_datetime() {
    return gmdate('Y-m-d H:i:s');
}

/**
 * Example function to say hello.
 * @param string $name Name of the person to greet.
 * @return string Greeting message.
 */
function say_hello($name) {
    return "Hello, " . htmlspecialchars($name) . "!";
}

// Add more helper functions as needed.

?>