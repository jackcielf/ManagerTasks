<?php
include('../db/conexao.php');
                
                $nome = filter_input(INPUT_POST, "usuario", FILTER_DEFAULT);
                $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
                $senha = filter_input(INPUT_POST, "senha", FILTER_DEFAULT);
                $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
                
                $codigo_sql_verificacao = "SELECT * FROM $tabelaUsuario WHERE email = '$email'";
                $codigo_sql = "INSERT INTO $tabelaUsuario (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";

				$sql_query = mysqli_query($conn, $codigo_sql_verificacao);
				
                $numero_linha = $sql_query -> num_rows;
                if ($numero_linha >= 1) {
                    echo "<div class='container-fluid text-center p-3 border border-danger' style='background: rgba(255, 0, 0, .6);'>
                              <p class='fw-semibold text-light m-0'>Este e-mail já esta registrado!</p> 
                          </div>";
                    unset($_SESSION['email']);
	                unset($_SESSION['senha']);
                } else {
                    $conn -> query($codigo_sql);
                    
                    // $_SESSION['nome'] =  $nome;
                    $_SESSION['email'] = $email;

                    $codigo_sql_usuario = "SELECT * FROM $tabelaUsuario WHERE email = '$email'";

                    $sql_query_usuario = mysqli_query($conn, $codigo_sql_usuario);

                    $dados_usuario = mysqli_fetch_assoc($sql_query_usuario);

                    $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
	                $_SESSION['nome'] = $dados_usuario['nome'];
	                $_SESSION['email'] = $dados_usuario['email'];

                    header("Location: ../principal/indexPrincipal.php");
                }
?>