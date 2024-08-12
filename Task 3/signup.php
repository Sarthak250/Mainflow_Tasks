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
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    
    if ($pass !== $confirm_pass) {
        echo "Passwords do not match!";
        exit;
    }

    
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

    
    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_pass')";

    
    if ($conn->query($sql) === TRUE) {
        
        header("Location: login.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
