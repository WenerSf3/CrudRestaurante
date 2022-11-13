<?php

include 'conect.php';

session_start();
if($_SESSION["logado"] == false){
  header ('location:index.php');
}

$buscar_cadastro = "SELECT * FROM clientes";
$buscar_pratos = "SELECT * FROM pratos";
$selecionar_clientes = mysqli_query($conectar, $buscar_cadastro);
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
  <link rel="stylesheet" href="styles/admin.css">
  <script src="scripts/admin.js"></script>

  <title>Home</title>
</head>

<body>

  <header>
    <!-- <img src="images/Meu restaurante.png" alt="Logo" id="logo"> -->
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

  <section>
    <h2>LISTA DE CADASTRADOS</h2><br>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">R/Novidades</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <?php
        while ($recebendo_cadastro = mysqli_fetch_array($selecionar_clientes)) {
          $id = $recebendo_cadastro['id'];
          $nome = $recebendo_cadastro['nome'];
          $email = $recebendo_cadastro['email'];
          $novidades2 = $recebendo_cadastro['novidades2'];
          $telefone = $recebendo_cadastro['telefone']; ?>
          <tbody>
            <tr>
              <form id="form1" action="editar.php" method="POST">
                <td scope="row">
                  <?php echo $id ?>
                </td>
                <td>
                  <?php echo $nome ?>
                </td>
                <td>
                  <?php echo $email ?>
                </td>
                <td>
                  <?php echo $telefone ?>
                </td>
                <td style="text-align: center;">
                  <?php echo $novidades2 ?>
                </td>
              </form>
              <td>
                <form style="text-align: center;" action="Excluir.php" method="POST">
                  <input type="hidden" name="ID" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-dark"><i class="fa-sharp fa-solid fa-trash"></i>
                </form>
              </td>
            </tr>
          <?php }; ?>

          </tbody><br>
      </table>
  </section>


  <section>
  <h2>LISTA DE PRATOS</h2>
    <div class="modal_addpratos" id="addpratos">
      <div id="formaddprato" class="formprato">
        <img id="imgteste" style="width:150px;height:150px;border:1px solid black;border-radius:20px;margin-top:20px;" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Baby.tux.sit-black-800x800.png" alt="">
        <label>NOME DO PRATO</label>
        <input type="text" id="nomeprato">
        <label>Link da foto</label>
        <input type="text" id="foto">
        <button class="btn btn-dark" onclick="teste()">TESTAR</button><br>
        <input class="btn btn-success" onclick="adicionarprato()" value="Adicionar"><br><br><br>
      </div>
    </div>
    </div>
  </section>
  <main> 
    <div>
      <a href="#" class="doble" onclick="addprato()()">
        <label>ADICIONAR</label><br>
        <img src="https://png.pngtree.com/png-vector/20190217/ourlarge/pngtree-vector-add-icon-png-image_555576.jpg">
        <form style="text-align: center;" action="excluirfoto.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </a>
    </div>

    <?php
    while ($recebendo_pratos = mysqli_fetch_array($selecionar_pratos)) {
      $id = $recebendo_pratos['id'];
      $nome = $recebendo_pratos['nome'];
      $foto = $recebendo_pratos['foto']; ?>

      <div>
        <a href="#" class="doble" onclick="login()">
          <label><?php echo $nome ?></label><br>
          <img src="<?php echo $foto ?>">

        </a>
        <form style="text-align: center;" action="excluirfoto.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <button type="submit" class="btn btn-light" style="height:45px;position:absolute;right: 37px;top: 52px;"><i class="fa-sharp fa-solid fa-trash"></i>
        </form>
      </div>
    <?php }; ?>

  </main>

</body>

</html>