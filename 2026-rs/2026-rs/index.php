<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome  = $_POST["nome"];
    $email = $_POST["email"];
    $cpf   = preg_replace('/[^0-9]/', '', $_POST["cpf"]); // remove pontos e traços
    $data  = $_POST["data_nascimento"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, cpf, data_nascimento, senha)
            VALUES ('$nome', '$email', '$cpf', '$data', '$senha')";

    if ($conn->query($sql)) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro: CPF ou Email já cadastrado');</script>";
    }
}
?>
