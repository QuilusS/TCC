<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "primus_bd";

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $bd);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falha: " . $conn->connect_error);
}
?>