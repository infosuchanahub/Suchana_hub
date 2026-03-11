<?php
// add_class.php

// Start the session
session_start();

// Include database configuration file
include('config.php');

// Define variables and initialize with empty values
$class_name = '';
$error = '';

// Process form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty(trim($_POST['class_name']))) {
        $error = 'Please enter a class name.';
    } else {
        $class_name = trim($_POST['class_name']);
    }

    // Validate and insert into database
    if (empty($error)) {
        $sql = 'INSERT INTO classes (name) VALUES (?)';
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('s', $class_name);
            if ($stmt->execute()) {
                // Redirect to class listing page after successful insertion
                header('location: class_list.php');
                exit;
            } else {
                $error = 'Something went wrong. Please try again later.';
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
</head>
<body>
    <h2>Add New Class</h2>
    <form action="" method="POST">
        <div>
            <label>Class Name</label>
            <input type="text" name="class_name" value="<?php echo htmlspecialchars($class_name); ?>">
            <span><?php echo $error; ?></span>
        </div>
        <div>
            <button type="submit">Add Class</button>
        </div>
    </form>
</body>
</html>