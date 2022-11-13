<?php
    include 'conect.php';

    $id = $_POST ['id'];

    $recebendo_pratos = " DELETE FROM pratos WHERE id = '$id' ";

    $selecionar_pratos = mysqli_query($conectar,$recebendo_pratos);

    header('location: Admin.php');
?>