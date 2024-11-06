<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $is_admin_login = isset($_POST['admin_login']) ? true : false;

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['is_admin'] = $usuario['is_admin'];

        if ($is_admin_login && $usuario['is_admin'] != 1) {
            echo "Acesso negado! Somente administradores podem usar este login.";
        } else {
            $redirect_page = ($is_admin_login && $usuario['is_admin'] == 1) ? 'admin_dashboard.php' : 'dashboard.php';
            header("Location: $redirect_page");
            exit;
        }
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/logar.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Login</button>
            <button type="submit" name="admin_login">Logar como Administrador</button>
        </form>
    </div>
</body>
</html>
