<?php
    session_start();

    if (isset($_SESSION['email'])){  
        header('Location: indexPrincipal.php');
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
    <title>Manager Tasks</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <nav class="navbar navbar-expand-lg bg-black" style="box-shadow: 2px 2px 10px rgba(80, 80, 80, .4)">
        <div class="container-fluid">
            <a class="navbar-brand text-light ms-3 fw-semibold">ManagerTasks</a>
            <a href="../registrar/index.php" class="btn btn-primary pt-1 pe-3 pb-1 ps-2 me-3">Registrar-me</a>
        </div>
    </nav>

    <!-- CONTEÚDO -->
    <main class="telaPrincipal m-0 p-0 text-bg-dark row justify-content-around">
        <!-- Panfleto -->
        <div class="panfleto mt-5 overflow-hidden p-0 position-relative bg-primary shadow rounded-4 fs-1 d-flex align-items-center justify-content-between flex-column">
            <div class="efeito-blur rounded-4 position-absolute"></div>
            <div class="container text-center pt-2 border-bottom border-light">
                <h1 class="titulo">Assunto</h1>
            </div>

            <span class="abrir position-absolute ps-4 fs-5 pt-3 pe-4 pb-2">•••</span>

            <div class="menu position-absolute fs-6">
                <span class="p-2 fw-light bg-dark d-block rounded-start">Editar</span>
                <span class="p-2 fw-light bg-dark d-block mt-1 rounded-start">Excluir</span>
            </div>
            <div class="text-center fs-3 pt-2 fw-light pe-2 ps-2">
                <p class="tarefa fst-italic">Tarefa do dia</p>
            </div>
            <div class="infors d-flex flex-row align-items-center justify-content-between fs-5 container rounded-3 pt-3">
                <h4 class="prioridade fw-semibold">Alta</h4>
                <p>
                    <span>
                        12:00
                    </span> -
                    <span>
                        13:00
                    </span>
                </p>
            </div>
        </div>
        
        <!-- Botão flutuante -->
        <button class="menu_float border bg-dark opacity-75 rounded-circle overflow-hidden shadow position-fixed">
            <a class="navbar-brand" href="../registrar/index.php">
                <i class="fa-solid fa-plus text-light fs-1 ps-1 pt-1 pe-1"></i>
            </a>
        </button>

        <!-- Mensagem de saudações temporária -->
        <div class="saldacoes position-fixed rounded-start d-flex align-items-center justify-content-start">
            <p class='fs- ms-3'>Olá, faça seu cadastro e organize-se!</p>
        </div>

        <!-- Rodapé -->
        <footer class="bg-black opacity-25 container-fluid position-fixed" style="bottom: 0; font-size: .7em" name="submit">
            <div class="d-flex align-items-center justify-content-end opacity-25">
                <span>Authors: Jack and Peteca</span>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
