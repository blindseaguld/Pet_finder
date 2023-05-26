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
      
      var addToCartButtons = document.querySelectorAll('.add-to-cart');
      addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault(); 

          
          var petCard = this.closest('.pet-card');
          var petName = petCard.querySelector('h3').textContent;
          var petPrice = petCard.querySelector('.price').textContent;

          
          var petInfo = {
            name: petName,
            price: petPrice
          };

          
          var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

         
          cartItems.push(petInfo);

          
          localStorage.setItem('cartItems', JSON.stringify(cartItems));

        

         
        });
      });
    });
  </script>
</body>
</html>
