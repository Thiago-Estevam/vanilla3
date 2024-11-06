<?php
// Conexão com o banco de dados
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    
    // Diretório para armazenar as imagens
    $target_dir = "perifericos/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
        // Insere o produto no banco de dados
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $preco, $target_file]);

        header("Location: admin_dashboard.php"); // Redireciona após adicionar
        exit;
    } else {
        echo "Desculpe, ocorreu um erro ao fazer o upload da imagem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="css/admin.css"> <!-- Link para seu CSS -->
</head>
<body>
    <h2>Adicionar Novo Produto</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem" accept="image/*" required>

        <button type="submit">Adicionar Produto</button>
    </form>
    <a href="adicionar_produto.php">Adicionar Novo Produto</a>
<!-- Aqui você pode listar produtos com links para editar -->

</body>
</html>
