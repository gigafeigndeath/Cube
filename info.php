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
  <link rel="stylesheet" href="./styles/info-styles.css">
</head>
<body>

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
            <a href="admin.php">Админка</a>
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

    <div class="intro">
        <p>
        Центр цифрового образования детей «IT-куб» на базе муниципального автономного 
        общеобразовательного учреждения "Средняя общеобразовательная школа № 22" 
        Находкинского городского округа создан в 2022 году в рамках федерального проекта 
        «Цифровая образовательная среда» национального проекта «Образование».
        </p>
    </div>

    <!-- Блок с фото и текстом -->
     <main>
    <div class="about">
        <div class="about-img">
        <img src="./components/images/info.JPG" alt="Помещение">
        </div>
        <div class="about-text">
        <p>
            Он призван обеспечить освоение детьми актуальных и востребованных знаний, 
            навыков и компетенций в сфере информационно-телекоммуникационных технологий, 
            а также создание условий для выявления, поддержки и развития у детей 
            способностей и талантов, их профориентации, развития математической, 
            информационной грамотности, формирования критического и креативного мышления.
        </p>
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

</body>
</html>
