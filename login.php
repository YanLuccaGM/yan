<?php
include("conexao.php");

$cpf = $_POST["CPF"];
$senha = $_POST["senha"];

$sql = "select NOME from usuario where CPF = '$cpf' and SENHA = '$senha' ";
$resultado = $conn->query($sql);
$row = $resultado->fetch_assoc();

if(isset($row) && $row["NOME"] != ''){
    session_start();
    $_SESSION["cpf"] = $cpf;
    $_SESSION["senha"] = $senha;
    $_SESSION["nome"] = $row["NOME"];

    header("Location: gravar.php");
}else{
    die("senha incorreta");
}
