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
  
  <!-- Главный блок -->
  <div class="hero">

    <div class="hero-text">
      <h1>МАОУ "СОШ №22" НГО</h1>
      <h2>ЦЕНТР ЦИФРОВОГО ОБРАЗОВАНИЯ ДЕТЕЙ "IT-КУБ. НАХОДКА"</h2>
      <p class="separator"></p>
      <p>
        Образование детей по программам, направленным на ускоренное освоение актуальных 
        и востребованных знаний, навыков и компетенций в сфере информационных технологий
      </p>
    </div>

    <div class="hero-side">
      <img src="./components/images/запись 2024-2025.png" alt="Запись 2024-2025 учебный год" class="enroll-img">
    </div>

  </div>
  <div class="hero-extra">

    <p>
      Центр цифрового образования детей «IT-куб» создан в 2022 году в рамках
      федерального проекта «Цифровая образовательная среда» национального проекта
      «Образование».
    </p>

    <img src="./components/images/it-куб.png" alt="IT-Куб Находка" class="org-img">

  </div>
  <p class="separator1" style="margin-bottom: 1%;margin-top: 1%;"></p>
  <!-- Блок иконок с описанием -->
  <div class="info">
    <p class="info-intro">
      Центр цифрового образования детей «IT-куб» является частью образовательной среды 
      образовательной организации, на базе которой <b>осуществляется:</b>
    </p>

    <div class="info-grid">
      <div class="info-item">
        <p><b>реализация дополнительных программ</b> цифрового образования для детей различного возраста:</p>
        <div class="icons">
          <img src="./components/images/kuber 1.png" alt="CyberCube">
          <img src="./components/images/vr 1.png" alt="VR Cube">
        </div>
        
      </div>
      <p class="separator1"></p>
      <div class="info-item">
        <p><b>профориентация и просвещение</b> по цифровой грамотности и информационной безопасности:</p>
        <div class="icons">
          <img src="./components/images/syst 1.png" alt="SysAdmin Cube">
          <img src="./components/images/alg 1.png" alt="Alg Cube">
        </div>
      </div>
      <p class="separator1"></p>
      <div class="info-item">
        <p><b>организация образовательных мероприятий</b> для детей и педагогов:</p>
        <div class="icons">
          <img src="./components/images/robo.png" alt="RoboCube">
          <img src="./components/images/photo 1.png" alt="PythonCube">
        </div>
      </div>
      <p class="separator1"></p>
    </div>
</div>

  <!-- Проектная деятельность -->
  <div class="projects">
    <div class="projects-text">
      <p><b>организация проектной деятельности</b> в том числе в дистанционном  формате, для обучающихся общеобразовательных организаций, на базе  которых созданы центры «Точка роста» и детские технопарки «Кванториум»;</p>
      <p><b>организация конкурсов, олимпиад, хакатонов</b> по цифровым технологиям, информатике и программированию;</p>
    </div>
    <div class="projects-img">
      <img src="./components/images/организация.png" alt="Команда IT-Куб Находка на хакатоне">
    </div>
</div>

  <!-- Методическая поддержка -->
  <div class="support">
    <div class="support-img">
      <img src="./components/images/хакатон.png" alt="Всероссийский хакатон">
    </div>
    <div class="support-text">
      <p><b>методическая поддержка</b> общеобразовательных организаций в части  совершенствования подходов к преподаванию учебных предметов «Математика» и «Технология».</p>
      <p>Центры цифрового образования детей «IT-куб» создаются при поддержке Министерства просвещения Российской Федерации.</p>
    </div>
</div>
    <p class="footer-slogan">Открой мир технологий — стань создателем, а не просто пользователем! Изучай IT и меняй будущее!</p>
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
