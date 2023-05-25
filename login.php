<?php
session_start(); // Начало сессии

// Проверка, если пользователь уже авторизован, перенаправляем на главную страницу
if (isset($_SESSION['email'])) {
    header("Location: main.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Проверка соответствия введенного пароля хэшированному паролю в базе данных
        if (password_verify($password, $hashedPassword)) {
            // Учетные данные верны, устанавливаем сеанс для пользователя
            $_SESSION['email'] = $email;
            header("Location: main.php");
            exit();
        } else {
            // Неверный пароль
            $loginError = "Неверный пароль";
        }
    } else {
        // Пользователь с указанным email не найден
        $loginError = "Пользователь с указанным email не найден";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вход</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <a href="main.php">
        <img src="img/logo.svg" alt="Pet Finder" class="logo">
      </a>
      <h1>Вход</h1>
    </div>
  </header>

  <section class="login">
    <div class="container">
      <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Пароль:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Войти">
        </div>
      </form>

      <?php if (isset($loginError)): ?>
        <div class="error-message"><?php echo $loginError; ?></div>
      <?php endif; ?>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>© 2023 Ваше приложение. Все права защищены</p>
    </div>
  </footer>
</body>
</html>
