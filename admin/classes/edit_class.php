<?php
// edit_class.php

// Include database connection
include 'db_connection.php';

// Check if form is submitted
if (isset($_POST['update'])) {
    $classId = $_POST['class_id'];
    $className = $_POST['class_name'];
    $classDescription = $_POST['class_description'];

    // Update class in database
    $sql = "UPDATE classes SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $className, $classDescription, $classId);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Class updated successfully!";
    } else {
        echo "Error updating class.";
    }
}

// Fetch existing class data for editing
$classId = $_GET['id'];
$sql = "SELECT * FROM classes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $classId);
$stmt->execute();
$result = $stmt->get_result();
$class = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Class</title>
</head>
<body>
    <h1>Edit Class</h1>
    <form method="POST" action="edit_class.php">
        <input type="hidden" name="class_id" value="<?php echo $class['id']; ?>">
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" value="<?php echo $class['name']; ?>" required>
        <br>
        <label for="class_description">Description:</label>
        <textarea id="class_description" name="class_description" required><?php echo $class['description']; ?></textarea>
        <br>
        <input type="submit" name="update" value="Update Class">
    </form>
    <a href="classes.php">Back to Classes</a>
</body>
</html>