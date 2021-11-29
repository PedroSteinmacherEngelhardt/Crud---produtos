<?php
    session_start();
    include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Listar</title>
</head>
<body>
    <a href = "cad_produto.php">Cadastrar</a><br>
    <h1>Lista de Produtos</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        $qnt_result_pg = 3;

        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_produtos = "SELECT * FROM produtos LIMIT $inicio, $qnt_result_pg";
        $resultado_produtos = mysqli_query($conn,$result_produtos);
        while($row_produto = mysqli_fetch_assoc($resultado_produtos)){
            echo "ID: " . $row_produto['id'] . "<br>";
            echo "Nome: " . $row_produto['nome'] . "<br>";
            echo "Descrição: " . $row_produto['descricao'] . "<br>";
            echo "Quantidade: " . $row_produto['quantidade'] . "<br>";
            echo "Preço unitario: " . $row_produto['preco'] . "<br>";
            echo "UM: " . $row_produto['UM'] . "<br>";
            echo "<a href='editar_produto.php?id=" . $row_produto['id'] . "'>Editar</a><br>";
            echo "<a href='proc_apagar_produto.php?id=" . $row_produto['id'] . "'>Apagar</a><br><hr>";
        }

        $result_pg = "SELECT COUNT(id) AS num_result FROM produtos";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;
        echo "<a href='index.php?pagina=1'>Primeira</a>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
            if($pag_ant >= 1){
                echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a>";
            }
        }

        echo "$pagina";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
            if($pag_dep <= $quantidade_pg){
                echo "<a href='index.php?pagina=$$pag_dep'>$pag_dep</a>";
            }
        }

        echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
    ?>
</body>
</html>