<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    if(!empty($id)){

        $result_produto = "DELETE FROM produtos WHERE id='$id'";
        $resultado_produto = mysqli_query($conn, $result_produto);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style = 'color:green;'>Produto apagado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style = 'color:red;'>ERRO, falha ao apagar produto</p>";
            header("Location: index.php?id=$id");
        }

    }else{
        $_SESSION['msg'] = "<p style = 'color:red;'>Selecione um usuario</p>";
        header("Location: index.php?id=$id");
    }

    
