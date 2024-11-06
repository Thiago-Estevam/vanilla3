<?php
$host = 'localhost'; // Pode ser diferente dependendo da sua configuração
$db = 'ecommerce';
$user = 'root'; // Coloque seu usuário do MySQL
$pass = ''; // Coloque sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
