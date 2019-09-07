<?php
require "modelo/produtoModelo.php";

/** anon */
function index() {
    if (ehPost()) {
        $login = $_POST["email"];
        $passwd = $_POST["senha"];

        if (authLogin($login, $passwd)) {
            alert("bem vindo" . $login,"success");
            exibir("produto/formulario");
        } else {
            alert("usuario ou senha invalidos!","danger");
        }
    }
    redirecionar("produto/formulario");
}

/** anon */
function logout($id) {
    deletarLogout($id);
    alert("deslogado com sucesso!","success");
    redirecionar("produto");
}

?>
