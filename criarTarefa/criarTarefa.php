<?php
    include('../db/conexao.php');
                    
    $assunto = filter_input(INPUT_POST, "assunto", FILTER_DEFAULT);
    $tarefa = filter_input(INPUT_POST, "tarefa", FILTER_DEFAULT);
    $tempoInicio = filter_input(INPUT_POST, "tempoinicial", FILTER_DEFAULT);
    $tempoFim = filter_input(INPUT_POST, "tempofinal", FILTER_DEFAULT);
    $prioridade = filter_input(INPUT_POST, "exampleRadios", FILTER_DEFAULT);
    $id_usuario = $_SESSION['id_usuario'];
    $nome = $_SESSION['nome'];

    $codigo_sql = "INSERT INTO $tabelaTarefa(assunto, tarefa, inicio, fim, prioridade, nome, id_usuario) VALUES ('$assunto', '$tarefa', '$tempoInicio', '$tempoFim', '$prioridade', '$nome', '$id_usuario')";

    $sql_query = mysqli_query($conn, $codigo_sql);

    header("Location: ../principal/indexPrincipal.php");
?>