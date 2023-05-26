<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Регистрация</title>
  <link rel="stylesheet" href="css/registration.css">
  <script>
    window.addEventListener('DOMContentLoaded', function() {
      var errorMessage = document.querySelector('.error-message');
      if (errorMessage) {
        errorMessage.style.display = 'none';
      }
    });
  </script>
</head>
<body>
  <header class="header"> 
    <div class="container">
      <a href="main.php">
        <img src="img/logo.svg" alt="Pet Finder" class="logo">
      </a>
      <h1>Регистрация</h1>
    </div>
  </header>

  <section class="registration">
    <div class="container">
      <form id="registration-form" action="register.php" method="POST">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Пароль:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm-password">Подтверждение пароля:</label>
          <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Зарегистрироваться">
        </div>
      </form>

      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] === 'email_exists') {
          echo "<div class='error-message'>Такой имейл уже зарегистрирован</div>";
        }
      }
      ?>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>© 2023 Pet Finder. Все права защищены</p>
    </div>
  </footer>
</body>
</html>