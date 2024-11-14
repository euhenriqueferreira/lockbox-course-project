<?php

    // Destroi a sessão, com isso destroy o item 'auth' e desloga o user
    session_destroy();
    header('location: /login');
    exit();
?>