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
  <link rel="stylesheet" href="./styles/resources-styles.css">
</head>
<body>

  <!-- Шапка -->
  <div class="wrap">

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

  
    <main>
        <div class="docs">
        <div class="docs-block">
            <h3>ФЕДЕРАЛЬНЫЕ ДОКУМЕНТЫ</h3>
            <ul>
            <li>Методические рекомендации по созданию и функционированию центров цифрового образования «IT-куб»</li>
            </ul>
        </div>

        <div class="docs-block">
            <h3>РЕГИОНАЛЬНЫЕ ДОКУМЕНТЫ</h3>
            <ul>
            <li>Постановление правительства Приморского края от 13 января 2022 г. № 7-пп "О создании и функционировании центров цифрового образования «IT-куб» на территории Приморского края"</li>
            </ul>
        </div>

        <div class="docs-block">
            <h3>ЛОКАЛЬНЫЕ ДОКУМЕНТЫ ОБРАЗОВАТЕЛЬНОЙ ОРГАНИЗАЦИИ</h3>
            <ul>
            <li>Положение о Центре цифрового образования "IT куб"</li>
            <li>Договор сетевого взаимодействия с МАОУ "СОШ № 5" НГО</li>
            <li>Договор сетевого взаимодействия с МАОУ "СОШ № 7 «Эдельвейс»" НГО</li>
            <li>Договор сетевого взаимодействия с МАОУ "СОШ «Лидер – 2»" НГО</li>
            </ul>
        </div>
        </div>
    </main>

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
