<?php
    session_start();

    if (isset($_SESSION['email'])) {
        if (isset($_POST['submit'])) {
            if (strlen($_POST['tempoinicial']) == 0 || strlen($_POST['tempofinal']) == 0) {
                print_r("<div class='container-fluid text-center p-2 ms-1 rounded-4 border border-danger mb-1' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>Por favor, preencha todos os campos!</p>
                        </div>
                ");
            } else if (strlen($_POST['tempoinicial']) < strlen($_POST['tempofinal'])) {
            	print_r("<div class='container-fluid text-center p-2 ms-1 rounded-4 border border-danger mb-1' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>Por favor, preencha os horários corretamente!</p>
                        </div>
                ");
            } else if (strlen($_POST['assunto']) < 4 || strlen($_POST['assunto']) > 12) {
                print_r("<div class='container-fluid text-center p-2 ms-1 rounded-4 border border-danger mb-1' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>O assunto deve ter no minímo 4 caracteres e no máximo 12!</p>
                        </div>
                ");
            } else {
                include_once("criarTarefa.php");
            }
        }
    } else {
        header("Location: ../login/index.php");
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
    <title>Manager Tasks | Nova tarefa</title>
</head>

<body class="bg-black">
    <div class="telaForm d-flex align-items-center justify-content-center">
        <form action="" method="POST" class="text-bg-dark shadow-lg rounded-2 position-relative form p-3 text-center d-flex align-items-center flex-column justify-content-around">
            <a href="../principal/indexPrincipal.php" class="voltar btn text-light opacity-75 rounded-4 position-absolute">
                <i class="fa-solid fa-xmark fs-5 pt-1"></i>
            </a>
            <h1 class="mt-4 mb-5 fw-semibold text-center">Nova tarefa</h1>
            <div class="input-group mt-3 d-flex align-items-center">
                <label for="titulo" class="form-label ms-3 me-3">Assunto:</label>
                <input type="text" class="input text-white" name="assunto">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tarefa" class="form-label ms-3 me-3">Tarefa:</label>
                <input type="text" class="input text-white" name="tarefa">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tempo" class="form-label ms-3 me-3">Horário:</label>
                <input type="time" class="rounded me-3 p-1 input_time" name="tempoinicial"> -
                <input type="time" class="rounded ms-3 p-1 input_time" name="tempofinal">
            </div>
            <div class="input-group mt-4 d-flex align-items-center">
                <label for="tarefa" class="form-label ms-3 me-3">Prioridade: </label>
                <div class="opcoes d-flex justify-content-around align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Baixa" checked>
                        <label class="form-check-label" for="baixa">
                            Baixa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Média">
                        <label class="form-check-label" for="media">
                            Média
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="Alta">
                        <label class="form-check-label" for="alta">
                            Alta
                        </label>
                    </div>
                </div>
            </div>
            
            <input type="submit" value="Salvar" name="submit" class="btn btn-outline-primary mt-5 container p-3">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
