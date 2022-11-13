<?php
include 'conect.php';

$ID = $_POST ['id'];
$NOME = $_POST['nome'];
$EMAIL = $_POST['email'];
$TELEFONE = $_POST['telefone'];

$atualizando_cadastro = " UPDATE clientes SET NOME = '$NOME',EMAIL ='$EMAIL', TELEFONE = '$TELEFONE' WHERE ID = $ID";

$selecionar_clientes = mysqli_query($conectar,$atualizando_cadastro);

header('location: lista.php');
?>