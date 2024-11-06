<?php
$host = 'localhost';           // Host do banco de dados
$dbname = 'ecommerce';    // Nome do banco de dados
$user = 'root';                 // Usuário do banco de dados
$password = '';                 // Senha do banco de dados (deixe vazio se não houver)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
