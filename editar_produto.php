<?php
// Conexão com o banco de dados
include('conexao.php');

$id = $_GET['id']; // Obtém o ID do produto a ser editado
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    
    $target_dir = "perifericos/mouses/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);

    // Se uma nova imagem foi enviada
    if (!empty($_FILES["imagem"]["name"])) {
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
        // Atualiza o produto no banco de dados
        $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ?, imagem = ? WHERE id = ?");
        $stmt->execute([$nome, $preco, $target_file, $id]);
    } else {
        // Se a imagem não foi alterada, só atualiza nome e preço
        $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ? WHERE id = ?");
        $stmt->execute([$nome, $preco, $id]);
    }

    header("Location: admindashboard.php"); // Redireciona após editar
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Link para seu CSS -->
</head>
<body>
    <h2>Editar Produto</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" value="<?php echo $produto['preco']; ?>" step="0.01" required>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem" accept="image/*">

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>
