<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mydb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            
            header("Location: ../task2/login.html");
            exit;
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "No user found with that username!";
    }
}

$conn->close();
?>
