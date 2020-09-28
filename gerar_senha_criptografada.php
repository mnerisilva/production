<?php

    $senha = 'rosangeles2015';
    $criptografada = password_hash($senha, PASSWORD_DEFAULT); 
    echo 'Senha criptografada: '.$criptografada;
?>