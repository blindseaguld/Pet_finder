<?php
// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "Killerno1";
$dbname = "registration";

// Установка соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Шифрование пароля (например, с использованием функции password_hash)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Подготовка и выполнение SQL-запроса для вставки данных в базу данных
$stmt = $conn->prepare("INSERT INTO users (ID, email, password) VALUES (NULL, ? , ?)");
$stmt->bind_param("ss", $email, $hashedPassword);

try {
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        // Регистрация успешна
        session_start();
        $_SESSION['email'] = $email; // Сохраняем имейл в сессии
        header("Location: main.php"); // Перенаправление на главную страницу
        exit();
    } else {
        // Пользователь с таким имейлом уже существует
        header("Location: registration.php?error=email_exists"); // Добавляем параметр ошибки в URL
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Ошибка при регистрации: " . $e->getMessage();
}

// Закрытие соединения с базой данных
$stmt->close();
$conn->close();