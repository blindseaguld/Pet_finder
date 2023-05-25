<?php
$servername = "localhost";
$username = "root";
$password = "Killerno1";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$sql = "INSERT INTO registration.products (name, price)
        VALUES ('Бостон-терьер', 100),
               ('Вислоухая кошка 2', 50),
               ('хомяк 3', 25)";

if ($conn->query($sql) === TRUE) {
    echo "Продукты успешно добавлены в таблицу.";
} else {
    echo "Ошибка при добавлении продуктов: " . $conn->error;
}
if ($conn->query($sql) === TRUE) {
    echo "Продукты успешно добавлены в таблицу.";
} else {
    echo "Ошибка при добавлении продуктов: " . $conn->error;
}

$conn->close();
?>