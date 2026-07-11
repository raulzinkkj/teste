<?php
$local = 'localhost';  //Local do banco de dados
$banco = 'eventpro';   //Nome do banco de dados
$usuario = 'root';     //Usuario padrão do banco de dados
$senha = '';           //Senha do banco de dados

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Não deu certo" . $e->getMessage();
}
