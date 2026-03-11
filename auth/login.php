<?php
session_start();

// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'your_database_name';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php'); // Redirect to dashboard
            exit;
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'No user found with this email';
    }
}

$conn->close();
?>

<form method='POST' action=''>
    Email: <input type='email' name='email' required><br>
    Password: <input type='password' name='password' required><br>
    <button type='submit'>Login</button>
</form>
