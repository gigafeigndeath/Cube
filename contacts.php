<?php
require 'config.php';  // Подключаем БД
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT-Куб Находка</title>
  <link rel="stylesheet" href="./styles/main-styles.css">
  <link rel="stylesheet" href="./styles/contacts-styles.css">
  <link rel="icon" type="image/x-icon" href="./components/images/лого.png">
</head>
<body>

 <div class="wrap">
    
  <!-- Шапка -->
  <header class="header">
    <div class="logo">
      <a href="index.php">
      <img src="./components/images/лого.png" alt="IT-Куб Находка">
      </a>
    </div>
    <nav class="nav">
      <a href="info.php">О нас</a>
      <a href="contacts.php">Контакты</a>
      <a href="resources.php">Ресурсы</a>
        <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Показываем только залогиненным -->
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="admin.php">Админ панель</a>
        <?php else: ?>
            <a href="user.php">Профиль</a>
        <?php endif; ?>
        <a href="logout.php">Выйти</a>
        <?php else: ?>
            <!-- Показываем только незалогиненным -->
            <a href="logInto.php">Войти</a>
        <?php endif; ?>
    </nav>

  </header>

  <main>

    <div class="contacts-section">
        <div class="map"><a href="https://yandex.ru/maps/974/nahodka/?utm_medium=mapframe&utm_source=maps"></a><a href="https://yandex.ru/maps/974/nahodka/house/yubileynaya_ulitsa_12/ZUoEaA9kT0YEXkJuYWJ2eX1kbAk=/?ll=132.848544%2C42.781620&utm_medium=mapframe&utm_source=maps&z=17.15"></a><iframe src="https://yandex.ru/map-widget/v1/?ll=132.848544%2C42.781620&mode=whatshere&whatshere%5Bpoint%5D=132.846269%2C42.781782&whatshere%5Bzoom%5D=17&z=17.15" frameborder="1" allowfullscreen="true"></iframe></div>

        <div class="contacts-block">
            <h2>Контакты</h2>
            <div class="contact-info">
            <p>+79242402287<br>itcube25@yandex.ru</p>
            <p>
                ул. Юбилейная, 12 (здание МАОУ СОШ № 22),<br>
                3 этаж<br>
                г. Находка
            </p>
            </div>
            <div class="social-links">
            <a href="https://vk.com" target="_blank">
                <img src="./components/images/vk.png" alt="VK">
            </a>
            <a href="https://wa.me/79242402287" target="_blank">
                <img src="./components/images/telegram.png" alt="telegram">
            </a>
            </div>
        </div>
    </div>

  </main>

  <!-- Подвал -->
  <footer class="footer">
    
    <div class="footer-grid">
      <div>
        Основы алгоритмики и логики<br>
        Разработка VR и AR приложений<br>
        Системное администрирование
      </div>
      <div>
        Программирование роботов<br>
        Кибергигиена и работа с данными<br>
        Программирование на Python
      </div>
      <div class="contacts">
        <p>+7 924 204 2287<br>itcube22@yandex.ru<br>ул. Юбилейная 12, МАОУ СОШ №22</p>
      </div>
    </div>
  </footer>

 </div>

</body>
</html>
