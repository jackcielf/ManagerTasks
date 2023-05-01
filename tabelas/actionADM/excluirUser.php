<?php
    session_start();
    
    if (!empty($_GET['id_usuario'])) {
    	$id_usuario = $_GET['id_usuario'];
        include("../../db/conexao.php");

        $codigo_sql_tarefa = "SELECT * FROM $tabelaTarefa WHERE id_usuario = $id_usuario";
        $codigo_sql = "DELETE FROM $tabelaTarefa WHERE id_usuario = $id_usuario";

        $sql_query = mysqli_query($conn, $codigo_sql_tarefa);
        $numero_linha = $sql_query -> num_rows;

    	if($numero_linha >= 1){
            $sql_query = $conn -> query($codigo_sql);
        }
        
        $codigo_sql = "DELETE FROM $tabelaUsuario WHERE id_usuario = $id_usuario";
        
        $sql_query = $conn -> query($codigo_sql);
        
        header("Location: ../tabelaUsuarios.php");
    } else {
    	header("Location: ../indexPrincipal.php");
    }
?>