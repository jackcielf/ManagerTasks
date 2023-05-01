<?php
    session_start();
    
    if (!empty($_GET['id_tarefa'])) {
    	$id_tarefa = $_GET['id_tarefa'];
    	
        include("../../db/conexao.php");
        
        $codigo_sql = "DELETE FROM $tabelaTarefa WHERE id_tarefa = $id_tarefa";
        
        $sql_query = $conn-> query($codigo_sql);
        
        header("Location: ../indexPrincipal.php");
    } else {
    	header("Location: ../indexPrincipal.php");
    }
?>