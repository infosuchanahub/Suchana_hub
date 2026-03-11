<?php
// manage_staff.php

// Include database connection
include '../config/db.php'; // Adjust the path as necessary

// Handle ADD, EDIT and DELETE requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add Logic
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        // Insert your query to add staff
    }
    // Edit Logic
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        // Insert your query to update staff
    }
    // Delete Logic
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        // Insert your query to delete staff
    }
}

// Fetch all staff
$staff = []; // Fetch staff from database here

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
</head>
<body>
    <h1>Manage Staff</h1>

    <!-- Add Staff Form -->
    <h2>Add Staff</h2>
    <form method="post">
        <input type="text" name="name" required>
        <button type="submit" name="add">Add</button>
    </form>

    <!-- Staff List -->
    <h2>Staff List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff as $member): ?>
            <tr>
                <td><?php echo $member['id']; ?></td>
                <td><?php echo $member['name']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                        <button type="submit" name="edit">Edit</button>
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
