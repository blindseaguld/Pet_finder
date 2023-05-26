<?php
$servername = "localhost";
$username = "root";
$password = "Killerno1";
$dbname = "registration";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (ID, email, password) VALUES (NULL, ? , ?)");
$stmt->bind_param("ss", $email, $hashedPassword);

try {
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
       
        session_start();
        $_SESSION['email'] = $email; 
        header("Location: main.php"); 
        exit();
    } else {
       
        header("Location: registration.php?error=email_exists");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Ошибка при регистрации: " . $e->getMessage();
}

$stmt->close();
$conn->close();