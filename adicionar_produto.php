<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega os dados do formulário
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem']; // Certifique-se de que o caminho da imagem está correto

    // Insere o novo produto na tabela
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $preco, $imagem]);

    // Redireciona para a página inicial (ou onde preferir)
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
</head>
<body>
    <h1>Adicionar Novo Produto</h1>
    <form action="adicionar_produto.php" method="post">
        <input type="text" name="nome" placeholder="Nome do Produto" required>
        <input type="text" name="preco" placeholder="Preço" required>
        <input type="text" name="imagem" placeholder="Caminho da Imagem" required>
        <button type="submit">Adicionar Produto</button>
    </form>
</body>
</html>
