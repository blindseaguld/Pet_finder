<?php
  session_start();
  session_destroy(); // Закрыть сеанс и удалить все данные сеанса
  header("Location: main.php"); // Перенаправить пользователя на страницу входа
  exit();
?>
