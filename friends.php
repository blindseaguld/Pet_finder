<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Друзья</title>
  <link rel="stylesheet" href="css/friends.css">
</head>
<body>
  <header class="header">
    <div class="nav">
      <a href="main.php">
        <img src="img/logo.svg" alt="Pet Finder" class="logo">
      </a>
      <ul class="menu">
        <li><a href="friends.php">Друзья</a></li>
        <li><a href="contact.html">Контакты</a></li>
        <li><a href="cart.html">Корзина</a></li>
      </ul>
    </div>
  </header>

  <section class="pets">
    <div class="container">
      <h2>Наши друзья</h2>
      <div class="pet-cards">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "Killerno1";
        $dbname = "registration";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $price = $row["price"];

                // Вставляем данные в HTML-код
                echo '<div class="pet-card">';
                echo '<h3>' . $name . '</h3>';
                echo '<p class="price">Цена: $' . $price . '</p>';
                echo '<button class="add-to-cart">Добавить в корзину</button>';
                echo '</div>';
            }
        } else {
            echo "Нет доступных продуктов.";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Обработчик события для кнопок "Добавить в корзину"
      var addToCartButtons = document.querySelectorAll('.add-to-cart');
      addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault(); // Отменяем переход по ссылке

          // Получаем информацию о питомце
          var petCard = this.closest('.pet-card');
          var petName = petCard.querySelector('h3').textContent;
          var petPrice = petCard.querySelector('.price').textContent;

          // Создаем объект с информацией о питомце
          var petInfo = {
            name: petName,
            price: petPrice
          };

          // Получаем текущий список заказов из localStorage или создаем новый, если его нет
          var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

          // Добавляем питомца в список заказов
          cartItems.push(petInfo);

          // Сохраняем обновленный список заказов в localStorage
          localStorage.setItem('cartItems', JSON.stringify(cartItems));

        

         
        });
      });
    });
  </script>
</body>
</html>
