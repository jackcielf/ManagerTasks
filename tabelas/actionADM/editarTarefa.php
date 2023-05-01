<?php
    session_start();
	
	// Pegando o id da tarefa e requisitando os dados
    if (!empty($_GET['id_tarefa'])) {
    	$id_tarefa = $_GET['id_tarefa'];
    	
        include('../../db/conexao.php');
                
		$codigo_sql = "SELECT * FROM $tabela WHERE id_tarefa = $id_tarefa";
		$sql_query = mysqli_query($conexaoTarefa, $codigo_sql);
                
		$numero_linha = $sql_query -> num_rows;
		if ($numero_linha >= 1) {
			while($dado = mysqli_fetch_assoc($sql_query)) {
				$assunto = $dado['assunto'];
				$tarefa = $dado['tarefa'];
				$tempoInicio = $dado['inicio'];
				$tempoFim = $dado['fim'];
				$prioridade = $dado['prioridade'];
            }
		} else {
        	header("Location: ../indexPrincipal.php");
        }
    } else {
        header("Location: ../indexPrincipal.php");
    }
    
    // Verificando o click do botão e realizando a atualização dos dados
    if (isset($_POST['alterar'])) {
        include('../../db/conexao.php');
	    
		$id_tarefa = $_GET['id_tarefa'];
		$assunto = filter_input(INPUT_POST, "assunto", FILTER_DEFAULT);
        $tarefa = filter_input(INPUT_POST, "tarefa", FILTER_DEFAULT);
		$tempoInicio = filter_input(INPUT_POST, "tempoinicial", FILTER_DEFAULT);
		$tempoFim = filter_input(INPUT_POST, "tempofinal", FILTER_DEFAULT);
		$prioridade = filter_input(INPUT_POST, "exampleRadios", FILTER_DEFAULT);
		
		$codigo_sql_at = "UPDATE $tabelaTarefa SET assunto = '$assunto', tarefa = '$tarefa', inicio = '$tempoInicio', fim = '$tempoFim', prioridade = '$prioridade' WHERE id_tarefa = $id_tarefa";
		
		mysqli_query($conn, $codigo_sql_at);
		
		header("Location: ../tabelaTarefas.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Comfortaa:wght@300;700&family=Didact+Gothic&family=Fredoka+One&family=Open+Sans:wght@300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Manager Tasks | Editar tarefa</title>
    
    <style>
    	* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Comfortaa, sans-serif;
            border: none;
        }

        .telaForm {
            width: 100vw;
            height: 100vh;
    background: linear-gradient(45deg, rgba(10, 63, 132, 1), rgb(0, 0, 0));
        }

        .form {
            width: 400px;
            height: 550px;
        }

        .input {
            width: 100%;
            background: transparent;
            border-bottom: .5px solid #fff;
        }

        .input_time {
            width: 105px;
            font-size: .9em;
        }

        .input-group .opcoes {
            width: 300px;
        }

        .voltar {
            width: 40px;
            height: 40px;
            top: 0;
            right: 0;
        }
    </style>
</head>

<body class="bg-black">
    <div class="telaForm d-flex align-items-center justify-content-center">
        <form action="" method="POST" class="text-bg-dark shadow-lg rounded-2 position-relative form p-3 text-center d-flex align-items-center flex-column justify-content-around">
            <a href="../tabelaTarefas.php" class="voltar btn text-light opacity-75 rounded-4 position-absolute">
                <i class="fa-solid fa-xmark fs-5 pt-1"></i>
            </a>
            <h1 class="mt-4 mb-5 fw-semibold text-center">Editar tarefa</h1>
            <div class="input-group mt-3 d-flex align-items-center">
                <label for="titulo" class="form-label ms-3 me-3">Assunto:</label>
                <input type="text" class="input text-white" name="assunto" value="<?php echo $assunto ?>">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tarefa" class="form-label ms-3 me-3">Tarefa:</label>
                <input type="text" class="input text-white" name="tarefa" value="<?php echo $tarefa ?>">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tempo" class="form-label ms-3 me-3">Horário:</label>
                <input type="time" class="me-3 p-1 input_time" name="tempoinicial" value="<?php echo $tempoInicio ?>"> -
                <input type="time" class="ms-3 p-1 input_time" name="tempofinal" value="<?php echo $tempoFim ?>">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tarefa" class="form-label ms-3 me-3">Prioridade: </label>
                <div class="opcoes d-flex justify-content-around align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Baixa" <?php echo ($prioridade == 'Baixa') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="baixa">
                            Baixa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Média" <?php echo ($prioridade == 'Média') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="media">
                            Média
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Alta" <?php echo ($prioridade == 'Alta') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="alta">
                            Alta
                        </label>
                    </div>
                </div>
            </div>
            
            <input type="submit" value="Alterar" name="alterar" class="btn btn-outline-primary mt-5 container p-3">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>