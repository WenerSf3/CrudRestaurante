<?php
    
    include 'conect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $nome = $data['nome'];
    $foto = $data['foto'];
    $descricao = $data['descricao'];

    $inserindo_fotos = "INSERT INTO pratos VALUES('', '$nome','$foto','$descricao')";

    $selecionar_clientes = mysqli_query($conectar,$inserindo_fotos);

?>