<?php 
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $bd = 'dbtarefa';
    $tabelaUsuario = 'tbusuario';
    $tabelaTarefa = 'tbtarefa';
    
    $conn = new mysqli($host, $usuario, $senha, $bd);
    
    if ($conn -> connect_errno) {
        echo "ERRO: " . $conn -> connect_errno;
        exit();
    }
?>