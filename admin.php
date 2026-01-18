<?php
require 'config.php';  // Подключаем БД
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.html');
    exit;
}
// Для admin.html дополнительно:
if ($_SESSION['role'] !== 'admin') {
    header('Location: user.php');
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
  <link rel="stylesheet" href="./styles/admin-styles.css">
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

    <!-- Блок с фото и текстом -->
     <main>

        <div class="admin-panel">
            <h1>Администрирование</h1>
            <h2>Добро пожаловать, <?php echo htmlspecialchars($current_user['full_name']); ?>!</h2>
                <?php if ($current_user['role'] === 'admin'): ?>
                    <p>(Администратор)</p>
                <?php endif; ?>
            <div class="reply-box">
                <h2>Ответить на обращения</h2>
                <form>
                <input type="text" placeholder="Номер обращения">
                <input type="text" placeholder="Ответ">

                <div class="status-block">
                    <label style="text-align: left;">Выберите статус:</label>
                    <div class="status-buttons">
                    <button type="button">На рассмотрении</button>
                    <button type="button">Отклонено</button>
                    <button type="button">Завершено</button>
                    </div>
                </div>
                </form>
            </div>

            <div class="requests-box">
                <h2>Обращения к преподавателям</h2>
                <div class="requests-content">
                Обращения отсутствуют
                </div>
            </div>
        </div>


     </main>

     <footer>
        
     </footer>