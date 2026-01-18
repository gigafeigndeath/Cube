<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Заполните все поля';
    } else {
        $stmt = $pdo->prepare('SELECT id, password, role FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role']    = $user['role'];

            // Редирект в зависимости от роли
            if ($user['role'] === 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: user.php');
            }
            exit;
        } else {
            $error = 'Неверный email или пароль';
        }
    }
}

if (!empty($error)) {
    $_SESSION['login_error'] = $error;
    header('Location: logInto.php');
    exit;
}
?>