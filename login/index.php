<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        if (isset($_POST['submit'])) {
            if (strlen($_POST['email']) == 0 || strlen($_POST['senha']) == 0) {
                print_r("<div class='container-fluid text-center p-3 ms-1 rounded-4 border border-danger' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>Por favor, preencha todos os campos!</p>
                        </div>
                ");
            } else if (strlen($_POST['senha']) < 7){
                print_r("<div class='container-fluid text-center p-3 border border-danger' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>A senha deve ter no mínimo 7 caracteres!</p>             
                        </div>
                ");
            } else {
                include_once("logar.php");
            }
        }
    } else {
        header('Location: ../principal/indexPrincipal.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Comfortaa:wght@300;700&family=Didact+Gothic&family=Fredoka+One&family=Open+Sans:wght@300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Manager Tasks | Login</title>
    
    <style>
    	* {
		    margin: 0;
		    padding: 0;
		    box-sizing: border-box;
		    outline: none;
		    font-family: Comfortaa, sans-serif;
		    border: none;
		    text-decoration: none;
		    transition: .3s;
		}
		
		.pag-width {
		    width: 100vw;
		    height: 100vh;
		    background: linear-gradient(45deg, rgba(10, 63, 132, 1), rgb(0, 0, 0));
		}
		
		/* SETTINGS FORM */
		#form-register {
		    width: 370px;
		    min-height: 560px;
		    max-height: 620px;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    box-shadow: -1px -1px 10px rgba(2, 94, 255, 0.2);
		}
		
		.box_input {
		    min-height: 70px;
		    max-height: 130px;
		    color: rgba(255, 255, 255, 0.8) !important;
		}
		
		.link {
		    font-size: .85em;
		}
		
		.link a:hover {
		    text-decoration: none;
		}
		
		.link a:active {
		    color: rgba(8, 93, 241, .7);
		}
		
		.link a:visited {
		    color: rgba(8, 58, 241, .8);
		}
    </style>
</head>

<body>
    <div class="pag-width">
        <!-- FORM -->
        <form class="text-bg-dark position-absolute rounded-1 mx-auto p-4 d-flex flex-column justify-content-around" action="" method="POST" id="form-register" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-required="true">
           	<div class="container-fluid fw-bold text-center text-decoration-underline" style="margin-top: -15px; font-size: .9em">ManagerTasks</div>
            <div class="form-top">
                <h1 class="d-flex justify-content-center pb-4 fw-semibold border-bottom border-primary">Login</h1>
            </div>

            <div class="box_input">
                <label class="text-light" for="email">E-mail</label>
                <input class="p-2 mt-1 mb-1 rounded-4 form-control fs-6 text-bg-dark" type="email" name="email" id="email" placeholder="E-mail" required>
            </div>

            <div class="box_input">
                <label class="text-light" for="password">Senha</label>
                <input class="p-2 mt-1 mb-1 rounded-4 form-control fs-6 text-bg-dark" type="password" name="senha" id="senha" placeholder="Senha" required>
            </div>

            <button class="btn btn-outline-primary p-3 fs-5 rounded-1" type="submit" id="btnSubmit" name="submit">Entrar</button>

            <div class="link mt-2">
                <span class="opacity-75">Não está registrado?</span>
                <a href="../registrar/index.php">Click aqui</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
