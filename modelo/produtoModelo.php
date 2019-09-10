<?php

require_once "bibliotecas/mysqli.php";


function insertProduct($local, $agua, $quant, $cultura, $telefone, $email){
    $insert = "INSERT INTO user (local, agua, quant, cultura, telefone, email)
    VALUES ('$local', '$agua','$quant', '$cultura', '$telefone', '$email'); ";

    $cons = mysqli_query($cnx = conexao(), $insert);


    if (!$cons) {
        die('Erro ao cadastrar o usuario' . mysqli_error($cnx));
    }
    return 'Usuario cadastrado com sucesso!';
}

//

function deletarLogout($id){
  $comando = "DELETE FROM user WHERE id = '$id' ";
  $consulta = mysqli_query($cnx = conexao(), $comando);
  if (!$consulta) {
      die('Erro ao deslogar' . mysqli_error($cnx));
  }
  return 'Usuario deslogado com sucesso!';
}



/**
 *
  Read
 *
 * */

function getAllProducts() {
    $command = "SELECT * FROM user";
    $query = mysqli_query(conexao(), $command);
    $products = array();
    while ($product = mysqli_fetch_assoc($query)) {
        $products[] = $product;
    }
    return $products;
}

//
function getOneProduct($filterID) {
    $command = "SELECT * FROM user WHERE id = '$filterID' ";
    $query = mysqli_query($cnx = conexao(), $command);

    if (!$query) {
        die(mysqli_error($cnx));
    }

    $product = mysqli_fetch_assoc($query);

    return $product;
}

// function searchForNomeProduto($nomeProduto) {
//     $command = "SELECT * FROM tblproduto WHERE NomeProduto LIKE '%$nomeProduto%'";
//     $query = mysqli_query(conexao(), $command);
//     $products = array();
//
//     while ($product = mysqli_fetch_assoc($query)) {
//         $products[] = $product;
//     }
//
//     return $products;
// }
//
// function searchForCategoria($categoriaProduto) {
//     $command = "SELECT * FROM tblproduto WHERE CodCategoria = " . $categoriaProduto;
//     $query = mysqli_query($cnx = conexao(), $command);
//     $products = array();
//
//     if (!$query) {
//         die(mysqli_error($cnx));
//     }
//
//     while ($product = mysqli_fetch_assoc($query)) {
//         $products[] = $product;
//     }
//
//     return $products;
// }
//
// function pegarVariosProdutosPorId($carrinhoProdutos) {
//     for ($i = 0; $i < count($carrinhoProdutos)-1; $i++) {
//         $id = $carrinhoProdutos[$i]["id"];
//         $comando = "SELECT * FROM tblproduto WHERE CodProduto = '$id'";
//         $query = mysqli_query($cnx = conexao(), $comando);
//
//         if (!$query) {
//             die(mysqli_error($cnx));
//         }
//
//         $produto = mysqli_fetch_assoc($query);
//         $produto["quantidade"] = $carrinhoProdutos[$i]["quantidade"];
//         $produtos[] = $produto;
//     }
//
//     if (!empty($produtos)) {
//         return $produtos;
//     }
// }
//
// /**
//  *
//   Update
//  *
//  * */
function updateDataProduct($local, $agua, $quant, $telefone, $email, $id) {

    $update = "UPDATE user SET local = '$local',agua = '$agua',quant = '$quant',telefone = '$telefone',email = '$email' WHERE id = $id";
    $update = mysqli_query(conexao(), $update);

    if (!$update) {
        echo "Não deu certo " . mysqli_error(conexao());
    }
}

// function updateEstoqueProduto($codProduto, $quantidade, $estoque_atual){
//     print_r($estoque_atual);
//     $estoque = $estoque_atual - $quantidade;
//
//     $comando = "UPDATE tblproduto SET CodProduto = '$codProduto', Estoque = '$estoque' WHERE CodProduto = $codProduto";
//     $update = mysqli_query(conexao(), $comando);
//
//     if (!$update) {
//         echo "Não deu certo " . mysqli_error(conexao());
//     } else {
//         header("Location: ../index.php");
//     }
// }
//
// /**
//  *
//   Delete
//  *
//  * */
// function deleteProduct($codProduto) {
//     $comando2 = "SELECT Imagem FROM tblproduto WHERE CodProduto = '$codProduto'";
//     $resultado = mysqli_query(conexao(), $comando2);
//     $produto = mysqli_fetch_assoc($resultado);
//
//     $comando = "DELETE FROM tblproduto WHERE CodProduto = '$codProduto'";
//     $delete = mysqli_query(conexao(), $comando);
//
//     if (!$comando) {
//         echo "Erro: " . mysqli_error(conexao());
//         // }else{
//         // 	$caminhoImagem = $produto["Imagem"];
//         // 	unlink("./" . $caminhoImagem);
//         //
//     }
// }
//
// ?>
