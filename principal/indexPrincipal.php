<?php
    session_start();

    if (isset($_SESSION['email'])) {
        $nome = $_SESSION['nome'];
        $id_usuario = $_SESSION['id_usuario'];
        $email = $_SESSION['email'];
    } else {
        header("Location: ../registrar/index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="ManagerTaks: Login, logar, fazer login">
    <meta name="robots" content="index, follow">
    <meta name="author" content="@Jakki_fx">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylePrincipal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Comfortaa:wght@300;700&family=Didact+Gothic&family=Fredoka+One&family=Open+Sans:wght@300&family=Roboto:ital,wght@1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Manager Tasks | Principal</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <nav class="navbar top navbar-expand-lg bg-black" style="box-shadow: 2px 2px 10px rgba(80, 80, 80, .4)">
        <div class="container-fluid">
            <a class="navbar-brand text-light ms-3 fw-semibold">ManagerTasks</a>
            <div class="position-relative d-flex align-items-center justify-content-around me-3"
                style="min-width: 70px; max-width: 120px;">
                <?php
                if ($email == "jack@admin.com") {
                    echo "
	                    <div class='config'>
	                        <i class='fa-solid fa-gear text-light fs-4'></i>
	                    	<div class='items_adm row position-absolute bg-dark rounded-bottom'>
	                            <a href='../tabelas/tabelaUsuarios.php' class='column text-decoration-none text-light container-fluid p-2 m-0'>Tabela (usuários)</a>
	                            <a href='../tabelas/tabelaTarefas.php' class='column text-decoration-none text-light container-fluid m-0 p-2'>Tabela (tarefas)</a>
	                        </div>
	                    </div>
	                ";
                }
                ?>
	            <a href='action/editarUser.php' class='text-decoration-none text-light ms-2'>
	            	<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
					    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
					    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
					</svg>
	            </a>
                <a href="../login/sair.php" class="btn btn-danger ms-3 pt-1 pe-3 pb-1 ps-2">Sair</a>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO -->
    <main class="telaPrincipal m-0 p-0 text-bg-dark row justify-content-around">
        <!-- Panfleto -->
        <?php
	        include("../db/conexao.php");
	
	        $codigo_sql_tarefa = "SELECT * FROM $tabelaTarefa WHERE id_usuario = '$id_usuario' ORDER BY id_tarefa DESC LIMIT 10";
	        $sql_query = mysqli_query($conn, $codigo_sql_tarefa);
	        $numero_linha = $sql_query -> num_rows;
	        if ($numero_linha >= 1) {
		        $id = 1;
		        while ($dado = mysqli_fetch_assoc($sql_query)) {
		        	if ($dado['tarefa'] == '') {
		        		$dado['tarefa'] = "Sem mais detalhes!";
		        	}
		            echo "<div class='panfleto mt-5 overflow-hidden p-0 position-relative shadow rounded-4 fs-1 d-flex align-items-center justify-content-between flex-column'>
		            		<div class='num_panfleto d-none'>$numero_linha</div>
							<div class='overlay_panfleto_$id rounded-4 position-absolute'></div>
							<div class='container text-center pt-2 border-bottom border-light'>
							    <h1 class='titulo' style='font-size: .85em'>" . $dado['assunto'] . "</h1>
							</div>
							
							<span class='editar_panfleto_id_$id position-absolute ps-4 fs-5 pt-3 pe-4 pb-2'>•••</span>
							
							<div class='menu_panfleto_id_$id position-absolute fs-6'>
							    <span class='efeito_hover p-2 fw-light bg-dark d-block rounded-start'><a href='action/editarTarefa.php?id_tarefa=$dado[id_tarefa]' class='text-decoration-none text-light'>Editar</a></span>
							    <span class='p-2 fw-light bg-dark d-block mt-1 rounded-start'><a href='action/excluirTarefa.php?id_tarefa=$dado[id_tarefa]' class='text-decoration-none text-light'>Excluir</a></span>
							</div>
							<div class='text-center fs-3 pt-2 fw-light pe-2 ps-2'>
							    <p class='tarefa fst-italic' style='font-size: .85em'>" . $dado['tarefa'] . "</p>
							</div>
							<div class='infors_$id d-flex flex-row align-items-center justify-content-between fs-5 container rounded-3 pt-3'>
							    <h4 class='prioridade_$id fw-semibold'>" . $dado['prioridade'] . "</h4>
							    <p>
							        <span>" . $dado['inicio'] . "</span> -
							        <span>" . $dado['fim'] . "</span>
							    </p>
							</div>
						</div>";
		
		            $id++;
		        }
		    } else {
		        echo "<div style='width: 100vw; height: 100vh' class='d-flex align-items-center justify-content-center'>
		                <p class'opacity-25 fs-3'>Não há tarefas!</p>
					</div>";
		    }
        ?>

        <button class="menu_float border bg-dark opacity-75 rounded-circle overflow-hidden shadow position-fixed">
            <a href="../criarTarefa/index.php" class="navbar-brand">
                <i class="fa-solid fa-plus text-light fs-1 ps-1 pt-1 pe-1"></i>
            </a>
        </button>

        <!-- Mensagem de saudações temporária -->
        <div class="saldacoes position-fixed rounded-start d-flex align-items-center justify-content-start">
            <?php
            if ($email == "jack@admin.com") {
                echo "<p class='fs-6 ms-3'>Olá <span class='fw-semibold'>$nome</span>, seu admin foi liberado!";
            } else {
                echo "<p class='fs-6 ms-3'>Olá <span class='fw-semibold'>$nome</span>, seja bem vindo!";
            }
            ?>
        </div>

        <!-- Rodapé -->
        <footer class="bg-black opacity-25 container-fluid position-fixed" style="bottom: 0; font-size: .7em"
            name="submit">
            <div class="d-flex align-items-center justify-content-end opacity-25">
                <span>Authors: Jack and Peteca</span>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="js/scriptPrincipal.js"></script>
</body>

</html>