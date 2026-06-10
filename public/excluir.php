<?php

session_start();
include("components/verifica.php");

include("../infra/db/connect.php");

$id = $_GET["id"];

$sql = " DELETE FROM usuarios WHERE id = $id ";

if ($conn->query($sql) === TRUE) {
    header("Location: home.php");
    exit();
}

?>