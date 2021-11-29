<?php
    session_start();
    include_once("conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $preco = filter_input(INPUT_POST, 'preco');
    $UM = filter_input(INPUT_POST, 'UM', FILTER_SANITIZE_STRING);
        
    //echo "Nome: $nome" . "<br/>";
    //echo "descricao: $descricao" . "<br>";

    $result_produto = "UPDATE produtos SET nome='$nome', descricao='$descricao', quantidade='$quantidade', preco='$preco', UM='$UM' WHERE id='$id'";
    $resultado_produto = mysqli_query($conn, $result_produto);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style = 'color:green;'>Produto editado com sucesso</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style = 'color:red;'>Falha ao editar produto</p>";
        header("Location: editar.php?id=$id");
    }
?>