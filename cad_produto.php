<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Cadastrar</title>
</head>
<body>
    <a href = "index.php">Listar</a><br>
    <h1>Cadastrar Produto</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form method="POST" action="processa.php">
        <label>Nome: </label><br>
        <input type="text" name="nome" placeholder="nome"><br>

        <label>Descrição: </label><br>
        <textarea name="descricao" cols="30" rows="10"></textarea><br>

        <label>Preço unitario: </label><br>
        <input type="text" name="preco" placeholder="Preço unitario"><br>

        <label>Quantidade: </label><br>
        <input type="text" name="quantidade" placeholder="quantidade"><br>

        <label>Unidade de medida: </label><br>
        <input type="text" name="UM" placeholder="quilograma"><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>