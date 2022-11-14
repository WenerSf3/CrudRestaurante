
<?php

    session_start();
    $_SESSION["logado"] = false;
    $_SESSION["usuario"] = false;
    header ('location:index.php');

?>