<?php
include("../db/conexao.php");
                
                $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
                $senha = filter_input(INPUT_POST, "senha", FILTER_DEFAULT);
                
                $codigo_sql = "SELECT * FROM $tabelaUsuario WHERE email = '$email'";
                
                $sql_query = mysqli_query($conn, $codigo_sql);
                
                if ($sql_query) {
                    $dados_usuario = mysqli_fetch_assoc($sql_query);
                    if (password_verify($senha, $dados_usuario['senha'])) {
	                    // Pegando os dados do usuário que estão no DB e armazenando nas variáveis de tipo sessão
                    	$_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
	                    $_SESSION['nome'] = $dados_usuario['nome'];
	                    $_SESSION['email'] = $dados_usuario['email'];
	                    // $_SESSION['senha'] = $dados_usuario['senha'];
                		
	                    header('Location: ../principal/indexPrincipal.php');
                    } else {
                    	unset($_SESSION['email']);
	                    unset($_SESSION['senha']);
	                    
	                    header("Location: erro.php");
                    }
                } else {
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    
                    header("Location: erro.php");
                }
?>