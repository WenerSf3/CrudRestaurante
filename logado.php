<?php
include 'conect.php';
session_start();
if ($_SESSION["usuario"] == false) {
    header('location:index.php');
}
// isset = verificação de variavel
// strlen = RETORNA TAMANO DE UMA STRING  
// real_escape_string = pega um valor de caracteristicas especiais.  
// fetch_assoc = resultado que o query consutar
$buscar_pratos = "SELECT * FROM pratos";
$selecionar_pratos = mysqli_query($conectar, $buscar_pratos);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/home.css">
    <script src="scripts/index.js"></script>

    <title>Home</title>
</head>

<body>

    <header>
        <h2><a href="Index.php">BOMVIVER</a></h2>
        <ul>
            <a href="Index.php">
                <li class="links">HOME</li>
            </a>
            <a href="logout.php">
                <li class="links" id="sair" style="display: block;">SAIR</li>
            </a> 
        </ul>
    </header>
    <br>
    <h2 style="text-align: center;color:white;text-shadow:2px 2px 0px black;"> PRATOS GERAIS </h2>
    <section>

        <?php
        while ($recebendo_pratos = mysqli_fetch_array($selecionar_pratos)) {
            $id = $recebendo_pratos['id'];
            $nome = $recebendo_pratos['nome'];
            $foto = $recebendo_pratos['foto']; ?>

            <div>
                <?php 
                if($_SESSION['logado'] == false){
                    echo <<<HTML
                        <a href="#" class="doble" onclick="login()">
                    HTML;
                }else{
                    echo <<<HTML
                        <a href="#" class="doble">
                    HTML;
                }
                ?>
                    <label><?php echo $nome ?></label><br>
                    <img src="<?php echo $foto ?>">
                </a>
            </div>

        <?php }; ?>

    </section>
    <div style="display:flex;justify-content:center;">
        <h1 style="text-shadow: 1px 1px 20px red, 1px 1px 1px black;">AGRADEÇO A SUA PARTICIPAÇÃO</h1>
    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/personalizado.js"></script>
</body>

</html>