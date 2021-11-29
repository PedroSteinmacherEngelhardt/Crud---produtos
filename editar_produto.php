<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
    $result_produto = "SELECT *  FROM produtos WHERE id = '$id'";
    $resultado_produto = mysqli_query($conn, $result_produto);
    $row_produto = mysqli_fetch_assoc($resultado_produto);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar</title>
</head>
<body>
    <a href = "index.php">Listar</a><br>
    <h1>Editar Produto</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form method="POST" action="proc_edit_produto.php">

        <input type="hidden" name="id" value="<?php echo $row_produto['id']; ?>">

        <label>Nome: </label><br>
        <input type="text" name="nome" value="<?php echo $row_produto['nome']; ?>"><br>

        <label>Descrição: </label><br>
        <textarea name="descricao" cols="30" rows="10" value="batatinha"><?php echo $row_produto['descricao']; ?></textarea><br>

        <label>Preço unitario: </label><br>
        <input type="text" name="preco" value="<?php echo $row_produto['preco']; ?>"><br>

        <label>Quantidade: </label><br>
        <input type="text" name="quantidade" value="<?php echo $row_produto['quantidade']; ?>"><br>

        <label>Unidade de medida: </label><br>
        <input type="text" name="UM" value="<?php echo $row_produto['UM']; ?>"><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>