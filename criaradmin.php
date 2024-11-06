<?php
include 'conexao.php';

$nome = 'Gabriel';
$email = 'biscoito9060@gmail.com';
$senha = '623897gg';
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$is_admin = 1;

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, is_admin) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $senhaHash, $is_admin]);
    echo "Administrador adicionado com sucesso.";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
