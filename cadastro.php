<?php
    
    include 'conect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $nome = $data['nome'];
    $email = $data['email'];
    $telefone = $data['telefone'];
    $senha = $data['senha'];
    $novidades2 = $data['novidades2'];

    $hash = password_hash($senha,PASSWORD_DEFAULT);

    $recebendo_cadastro = "INSERT INTO clientes VALUES('', '$nome','$email','$telefone','$hash','$novidades2')";

    $selecionar_clientes = mysqli_query($conectar,$recebendo_cadastro);

    header('location: login.html')

?>
