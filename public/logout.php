<?php

session_start();
// incia a sessão
session_destroy();
// Destroi a seção
header("Location: ../index.php");
// Envia para o index
exit();

?>