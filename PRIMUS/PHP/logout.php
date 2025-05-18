<?php
session_start();
session_unset(); // Remove todas as variáveis da sessão
session_destroy(); // Destroi a sessão

$paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/PRIMUS/PAGINAS/TelaInicial.php';
header("Location: $paginaAnterior");

exit;
?>