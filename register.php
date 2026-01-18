<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email       = trim($_POST['email'] ?? '');
    $full_name   = trim($_POST['full_name'] ?? '');
    $user_class  = trim($_POST['user_class'] ?? '');
    $password    = $_POST['password'] ?? '';
    $confirm     = $_POST['confirm_password'] ?? '';

    // Валидация
    if (empty($email) || empty($full_name) || empty($password) || empty($confirm)) {
        $error = 'Все обязательные поля должны быть заполнены';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Неверный email';
    } elseif ($password !== $confirm) {
        $error = 'Пароли не совпадают';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль должен быть не менее 6 символов';
    } else {
        // Проверяем, существует ли email
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Email уже зарегистрирован';
        } else {
            // Регистрируем
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare('INSERT INTO users (email, full_name, user_class, password, role) VALUES (?, ?, ?, ?, "user")');
            $stmt->execute([$email, $full_name, $user_class ?: null, $hash]);
            
            // Автоматически логиним после регистрации
            $stmt = $pdo->prepare('SELECT id, role FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role']    = $user['role'];
            
            header('Location: user.php');
            exit;
        }
    }
}

// Если ошибка — можно вывести или редирект с сообщением
if (!empty($error)) {
    $_SESSION['register_error'] = $error;
    header('Location: logInto.php');
    exit;
}
?>