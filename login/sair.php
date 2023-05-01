<?php
    session_start();
    
    // Destroi as variaveis que permitem a sessão e a sessão em sí
    unset($_SESSION['nome']);
    unset($_SESSION['email']); 
    unset($_SESSION['senha']);
    session_destroy();
    
    header("Location: ../principal/index.php");
?>