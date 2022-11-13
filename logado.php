<?php
include 'conect.php';
// isset = verificação de variavel
// strlen = RETORNA TAMANO DE UMA STRING  
// real_escape_string = pega um valor de caracteristicas especiais.  
// fetch_assoc = resultado que o query consutar

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
            echo <<<HTML
            <script> 
                echo ('Seja Bem VIndo')
            </script>
            HTML;
            if ($result["hast"] == 'admin' || $result['email'] == 'admin@gmail.com') {
                echo 'Seja bemvindo admin';
                header('location: admin.php');
            }
        } else {
            echo <<<HTML
            <script> 
                alert ('Conta Nao Existente');
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
        <!-- <img src="images/Meu restaurante.png" alt="Logo" id="logo"> -->
        <h2><a href="Index.php">BOMVIVER</a></h2>
        <ul>
            <a href="Index.php">
                <li class="links">HOME</li>
            </a>
            <a href="Contato.html">
                <li class="links">PEDIDOS</li>
            </a>
            <a href="Contato.html">
                <li class="links">CONTATO</li>
            </a>
            <a class="links" href="Index.php" id="sair" style="display: block;margin-right:20px;">SAIR</a>
        </ul>


    </header>

    <section>
        <h2> CARDAPIO DO DIA </h3>
        <div id="tabela" >
            <a href="#" onclick="login()" class="doble">
                <label for="prato">JAPONESES</label>
                <img src="https://www.elevenrio.com.br/storage/2020/01/assorted-japanesse-food-2323398.jpg">
            </a>

            <a href="#" onclick="login()" class="doble">
                <label>VEGETARIANOS</label>
                <img src="images/prato 1.png">
            </a>

            <a href="#" onclick="login()" class="doble">
                <label>TRADICIONAiS</label>
                <img src="https://foodandroad.com/wp-content/uploads/2021/04/virado-paulista-brasil-1-1024x683.jpg" alt="Foto">

            </a>

            <a href="#" onclick="login()" class="doble">
                <label>AMERICANOS</label>
                <img src="https://inglestreinando.com/wp-content/uploads/2017/09/Pratos-dos-Estados-Unidos-panqueca-731x411.jpg" alt="Foto">
            </a>
        </div><br>
        <div id="tabela">
            <a href="#" onclick="login()" class="doble">
                <label for="prato">BRASILEIRINHO</label>
                <img src="https://imagens.usp.br/wp-content/uploads/pratodecomidafotomarcossantos003.jpg">
            </a>

            <a href="#" onclick="login()" class="doble">
                <label>ABARÁ</label>
                <img src="https://www.penaestrada.blog.br/wp-content/uploads/2021/02/comidas-tipicas-do-brasil-abara-768x495.jpg.webp">
            </a>

            <a href="#" onclick="login()" class="doble">
                <label>Onigiri</label>
                <img src="https://t2.rg.ltmcdn.com/pt/posts/1/7/0/bolinho_de_arroz_japones_10071_orig.jpg" alt="Foto">

            </a>

            <a href="#" onclick="login()" class="doble">
                <label>Especial da MAE</label>
                <img src="https://s2.glbimg.com/JAZaJrRJpVfXRP1BZwbAsUcuYLw=/0x0:1280x800/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_1f540e0b94d8437dbbc39d567a1dee68/internal_photos/bs/2022/R/X/Lj3rwSQpm7BgzSEvJ1Mw/macarrao-simples-como-fazer.jpg" alt="Foto">
            </a>
        </div><br><br>
            
        <div style="display:flex;justify-content:center;"><h1 style="text-shadow: 1px 1px 20px red, 1px 1px 1px black;">AGRADEÇO A SUA PARTICIPAÇÃO</h1></div>
    </section>


    <div class="modal_backdroplogin" id="modal_formlogin">
        <div class="modal_contentlogin">
            <div id="form2login">
                <form id="formmm" class="formlogin" method="POST">
                    <h3>LOGIN</h3>

                    <label> E-mail <br>
                        <input id="email" class="cp" type="email" name="email" placeholder="exemplo@exemplo.com"></label><br>

                    <label>Senha <br>
                        <input id="senha" class="cp" type="password" name="senha" placeholder="*********"></label><br><br>

                    <a href="#">
                        <li>Esqueci a senha</li>
                    </a>

                    <input onclick="validlogin()" type="submit" id="botao" class="btn btn-success" value="Entrar" /></input><br>
                    <h4 id="msg2"></h4>
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
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>