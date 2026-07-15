<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){


$nome_usuario = $_POST['nome_usuario'];

$usuario = [
    "nome_usuario" => $nome_usuario
];

$arquivo = "usuario.json";

if (file_exists($arquivo)) {
    $usuarios = json_decode(file_get_contents($arquivo), true);
} else {
    $usuarios = [];
}

$usuarios[] = $usuario;

file_put_contents(
    $arquivo,
    json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
}