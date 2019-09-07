<?php

require "modelo/produtoModelo.php";

/** anon */
function index() {
    $dados["produtos"] = getAllProducts();
    exibir("produto/dashboard", $dados);
}

/** anon */
function login() {
    // $dados["produtos"] = getAllProducts();
    redirecionar("produto/login");
}

/** anon */
function search() {
    if (ehPost()) {
        extract($_POST);
        $dados["produtos"] = searchForNomeProduto($pesquisa);
        exibir("produto/listar", $dados);
    } else {

    }
}

/** anon */
function visualizar($id) {
    $dados["produto"] = getOneProduct($id);
    exibir("produto/visualizar", $dados);
}

/** anon */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $msgRetorno = insertProduct($local, $agua, $quant, $telefone, $email);
        redirecionar("./");
    } else {
        exibir("produto/formulario");
    }
}



/** anon */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        $msgRetorno = updateDataProduct($local, $agua, $quant, $telefone, $email, $id);
        redirecionar("./");
    } else {
        $dados['produto'] = getOneProduct($id);
        exibir("produto/formulario", $dados);
    }
}

/** admin */
function deletar($id) {
    deleteProduct($id);
    redirecionar("produto/index");
}

?>
