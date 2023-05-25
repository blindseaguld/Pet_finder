

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Finder</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
  <header id="header" class="header"> 
    <div>
      <div class="nav">
        <a href="main.php">
          <img src="img/logo.svg" alt="Pet Finder" class="logo">
        </a>
        <ul class="menu">
          <li><a href="friends.php">Друзья</a></li>
          <li><a href="contact.html">Контакты</a></li>
          <li><a href="cart.html">Корзина</a></li>
        </ul>
        <img src="" alt="" class="phone">
        <a href="079525252" class="tel">079525252</a>

        <?php
  session_start();
  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "<p class='email'>$email</p>";
    echo "<a href='logout.php' class='logout'>Выйти</a>";
  } else {
    echo "<a href='login.php' class='login'>Вход</a>";
    echo "<a href='registration.php' class='registration'>Регистрация</a>";
  }
?>
       
      </div>
      <div class="offer">
        <h1>Найди преданного друга</h1>
        <p>Онлайн-магазин домашних животных подарит тебе друга в несколько кликов.</p>
        <a href="friends.php" class="look_pets">Посмотреть друзей</a>
      </div>
      <div class="dog">
        <img src="img/header.png" alt="dog_header">
      </div>
    </div>
  </header>
  <section id="why_us" class="why_us"> 
    <div class="container">
      <h2>Почему выбирают нас?</h2>
      <div class="reasons">
        <div class="reason">
          <img src="img/many_dogs.svg" alt="Reason 1">
          <h3>Большой выбор</h3>
          <p>У нас вы найдете разнообразных домашних животных для всех вкусов.</p>
        </div>
        <div class="reason">
          <img src="img/healthcare 1.svg" alt="Reason 2">
          <h3>Качество и забота</h3>
          <p>Мы гарантируем здоровье и качество каждого питомца.</p>
        </div>
        <div class="reason">
          <img src="img/Group.svg" alt="Reason 3">
          <h3>Удобная доставка</h3>
          <p>Мы осуществляем доставку вашего нового друга прямо к вашему порогу.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="pets" class="pets">
    <div class="container">
      <h2>Наши друзья</h2>
      <div class="swiper-container pet-cards">
        <div class="swiper-wrapper">
          <div class="swiper-slide pet-card">
            <img src="img/brown_dog_header.png" alt="Pet 1">
            <h3>Бостон-терьер</h3>
            <p class="description">Прекрасная порода собаки для активных и любящих хозяев.</p>
            <p class="price">Цена: $500</p>
          </div>
          <div class="swiper-slide pet-card">
            <img src="img/imgonline-com-ua-Resize-pDqPpYXMQu7v8t.png" alt="Pet 2">
            <h3>Вислоухая кошка</h3>
            <p class="description">Красивая кошка с нежным характером и мягкой шерстью.</p>
            <p class="price">Цена: $300</p>
          </div>
          <div class="swiper-slide pet-card">
            <img src="img/hamster.png" alt="Pet 3">
            <h3>Хомяк</h3>
            <p class="description">Яркий и разговорчивый попугай, который станет отличным компаньоном.</p>
            <p class="price">Цена: $200</p>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  
  <section>
    <div class="container">
      <h2 class="gallery-title">Фотографии питомцев</h2>
      <div class="gallery-photos">
        <img src="img/dog_photo.jpg" alt="dog_photo">
        <img src="img/cat_photo (1).jpg" alt="cat_photo">
        <img src="img/fish_foto.jpg" alt="cat_photo">
     
      </div>
    </div>
  </section>
  
  <section class="contact">
    <div class="container">
      <h2 class="contact-title">Контакты</h2>
      <div class="contact-info">
        <p>Телефон: 079525252</p>
        <p>Email: info@petfinder.com</p>
      </div>
      <div class="contact-location">
        <h3>Местоположение</h3>
        <p>Адрес: ул. Примерная, 12345, Город</p>
      </div>
    </div>
  </section>


  <footer class="footer">
    <div class="container">
      <p>© 2023 Pet Finder. Все права защищены.</p>
    </div>
  </footer>

</body>
</html>
  
