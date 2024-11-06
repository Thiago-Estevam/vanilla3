<?php
session_start();
require 'db.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verificar se o e-mail já está cadastrado
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $erro = "Este email já está registrado!";
    } else {
        // Inserir novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        if ($stmt->execute([$nome, $email, $senha_hash])) {
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true; // Usuário logado
            header("Location: index.php");
            exit();
        } else {
            $erro = "Erro ao cadastrar. Tente novamente!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastrar-se</h2>
        <?php if (isset($erro)): ?>
            <p style="color: red; text-align: center;"><?php echo $erro; ?></p>
        <?php endif; ?>
        <form method="POST" action="cadastrar.php">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
