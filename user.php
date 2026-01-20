<?php
require 'config.php';  // Подключаем БД
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.html');
    exit;
}
$stmt = $pdo->prepare('SELECT full_name, role FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
$current_user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT-Куб Находка</title>
  <link rel="stylesheet" href="./styles/main-styles.css">
  <link rel="stylesheet" href="./styles/user-styles.css">
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
        <div class="container">
            
            <div class="profile">
            <img src="./components/images/profile.png" alt="Аватар">
            <div class="profile-info">
                <h2>Добро пожаловать, <?php echo htmlspecialchars($current_user['full_name']); ?>!</h2>
                <?php if ($current_user['role'] === 'admin'): ?>
                    <p>(Администратор)</p>
                <?php endif; ?>
            </div>
            </div>

            
            <div class="form">
            <h2>Задайте вопрос!</h2>
            <input type="text" placeholder="ФИО Студента">
            <input type="text" placeholder="ФИО Преподавателя">
            <textarea placeholder="Вопрос к преподавателю*" rows="3"></textarea>
            <button type="submit">Отправить</button>
            </div>
        </div>
        <div class="requests-box">
            <h2>Обращения к преподавателям</h2>
            <div class="requests-content">
            Обращения отсутствуют
            </div>
        </div>
    </main>

    <footer>
        
    </footer>
</div>