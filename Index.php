<?php
include 'conect.php';
session_start();
// isset = verificação de variavel
// strlen = RETORNA TAMANO DE UMA STRING  
// real_escape_string = pega um valor de caracteristicas especiais.  
// fetch_assoc = resultado que o query consutar
$buscar_pratos = "SELECT * FROM pratos";
$selecionar_pratos = mysqli_query($conectar, $buscar_pratos);

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo <<<HTML
            <script> 
                alert ('preencha os email');
            </script>
            HTML;
    } else if (strlen($_POST['senha']) == 0) {
        echo <<<HTML
            <script> 
                alert ('preencha os senha');
            </script>
            HTML;
    } else {

        $email = $conectar->real_escape_string($_POST["email"]);
        $senha = $conectar->real_escape_string($_POST["senha"]);

        $querySelect = "SELECT * FROM `clientes` WHERE email = '$email' LIMIT 1 ";
        $cn_query = $conectar->query($querySelect);
        $result = $cn_query->fetch_assoc();

        if (password_verify($senha, $result["hast"])) {
            header('location: logado.php');
            $_SESSION["usuario"] = true;
            echo <<<HTML
            <script> 
                document.getElementById('botao').type = 'submit';
            </script>
            HTML;

            if ($result["hast"] == 'admin' || $result['email'] == 'admin@gmail.com') {
                echo 'Seja bemvindo admin';
                $_SESSION["logado"] = true;
                header('location: admin.php');
            }
        } else {
            echo <<<HTML
            <script> 
                alert ('Conta Nao Existente');
                window.location.href = "Cadastro.html";
            </script>
            HTML;
        }
    }
}

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
            <?php 
                if($_SESSION["logado"] == true){
                    echo <<<HTML
                        <a href="Admin.php">
                        <li class="links" id="loginc">ADMIN</li>
                        </a> 
                    HTML;
                }
                    
                if($_SESSION["usuario"] == true){
                    echo <<<HTML
                    <a href="#">
                    <li class="links" id="loginc" onclick="login()">PEDIDOS</li>
                    </a>
                    <a href="logout.php">
                    <li class="links" id="sair" style="display: block;">SAIR</li>
                    </a> 
                HTML;
                }else{
                    
                    echo <<<HTML
                    <a href="#">
                    <li class="links" id="loginc" onclick="login()">LOGIN</li>
                    </a>
            
                    <a href="#">
                    <li class="links" id="signc" onclick="sign()" style="display: block;">CADASTRO</li>

                    </a> 
                HTML;
                }
            ?>
            
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
                <a href="#" class="doble" onclick="login()">
                    <label><?php echo $nome ?></label><br>
                    <img src="<?php echo $foto ?>">
                </a>
            </div>
            
            <?php }; ?>
            
    </section>


    <div class="modal_backdroplogin" id="modal_formlogin">
        <div class="modal_contentlogin">
            <div id="form2login">
                <form class="formlogin" method="POST" action="Index.php">
                    <h3>LOGIN</h3>

                    <label> E-mail <br>
                        <input id="email" class="cp" type="email" name="email" placeholder="exemplo@exemplo.com"></label><br>

                    <label>Senha <br>
                        <input id="senha" class="cp" type="password" name="senha" placeholder="*********"></label><br><br>

                    <a href="#">
                        <li>Esqueci a senha</li>
                    </a>

                    <input onclick="validlogin()" type="button" id="botao" class="btn btn-success" value="Entrar" /></input><br>

                </form>

                <div>
                    <h5>logar com: </h5>
                    <div id="icons">
                        <a href="https://accounts.google.com/login?hl=pt-br"><i id="footer" class="fa-brands fa-google"></i></a>
                        <a href="https://pt-br.facebook.com/login/device-based/regular/login/"><i id="footer" class="fa-brands fa-facebook"></i></i></a>
                        <a href="https://core.telegram.org/blackberry/login"><i id="footer" class="fa-brands fa-telegram"></i></a>
                        <a href="https://github.com/login?return_to=https%3A%2F%2Fgithub.com%2Fvtex-apps%2Flogin%2Fblob%2Fmain%2Fdocs%2FREADME.md"><i id="footer" class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <a class="cadastrar" id="signc" onclick="sign()" style="cursor: pointer;">Cadastrar-se</a>
                </ul>
                <h4 id="msg2"></h4>
            </div>
        </div>
    </div>

    <div class="modal_backdropsign" id="modal_formsign">
        <div class="modal_contentsign">
            <div id="form2sign">
                <div class="formsign">
                    <h3>CADASTRO</h3>

                    <label> Nome Completo <br>
                        <input id="nome2" class="cp" type="text" name="Nome" placeholder="Ex: Elisabet"></td>
                    </label>

                    <label> E-mail <br>
                        <input id="email2" class="cp" type="email" name="email" placeholder="exemplo@exemplo.com"></label>

                    <label> Telefone <br>
                        <input id="telefone2" class="cp" type="tel" name="telefone" placeholder="(00) 0000-0000"></label>

                    <label>Senha <br>
                        <input id="senha2" class="cp" type="password" name="senha" placeholder="*********"></label>

                    <label>Confirme sua Senha <br>
                        <input id="confirmSenha2" class="cp" type="password" name="senha" placeholder="*********"></label><br>
                    <p></p>

                    <div><input type="checkbox" name="novidades2" id="novidades">Receber Novidades</div>
                    <input type="hidden" name="novidades2" id="novidades2" value="">

                    <input onclick="validsign()" type="submit" id="botao" class="btn btn-success" value="CADASTRAR" /></input><br>
                    <h4 id="msg"></h4>
                </div>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/personalizado.js"></script>
</body>

</html>