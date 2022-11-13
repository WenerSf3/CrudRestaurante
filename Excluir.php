<?php
    include 'conect.php';

    $ID = $_POST ['ID'];

    $recebendo_cadastro = " DELETE FROM clientes WHERE ID = '$ID' ";

    $selecionar_clientes = mysqli_query($conectar,$recebendo_cadastro);

    header('location: Admin.php');
?>