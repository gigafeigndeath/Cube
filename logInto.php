<?php
require 'config.php';  // Подключаем БД
session_start();

// Извлекаем ошибки из сессии и сразу очищаем их
$login_error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);

$register_error = $_SESSION['register_error'] ?? '';
unset($_SESSION['register_error']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT-Куб Находка</title>
  <link rel="stylesheet" href="./styles/main-styles.css">
  <link rel="stylesheet" href="./styles/logIn-styles.css">
  <link rel="icon" type="image/x-icon" href="./components/images/лого.png">
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
        <div class="auth-container">
            <!-- Регистрация -->
            <div class="auth-box">
                <h2>Создать аккаунт</h2>
                
                <?php if ($register_error): ?>
                    <div class="error-message">
                        <p style='color: #d32f2f;background: #ffebee;'><?php echo htmlspecialchars($register_error); ?></p>
                    </div>
                <?php endif; ?>

                <form action="register.php" method="post">
                <label>Email</label>
                <input type="email" name="email" placeholder="mail" required>

                <label>Фамилия Имя Отчество</label>
                <input type="text" name="full_name" placeholder="Введите ФИО" required>

                <label>Класс (родителям ничего вводить не нужно)</label>
                <input type="text" name="user_class" placeholder="Введите класс">

                <label>Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <span class="toggle-password">*</span>
                </div>

                <label>Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                    <span class="toggle-password">*</span>
                </div>

                <button type="submit" class="btn">Создать</button>
            </form>
            </div>

            <!-- Вход -->
            <div class="auth-box">
                <h2>Войти в аккаунт</h2>

                <?php if ($login_error): ?>
                    <div class="error-message">
                        <p style='color: #d32f2f;background: #ffebee;'><?php echo htmlspecialchars($login_error); ?></p>
                    </div>
                <?php endif; ?>


                <form action="login.php" method="post">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="mail" required>

                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <span class="toggle-password">*</span>
                    </div>

                    <button type="submit" class="btn">Войти</button>
                </form>
                
                </form>
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
