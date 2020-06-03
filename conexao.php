<?php
//Então o sistema verificará o valor da variável acao e chamará a função correspondente
if(isset($_POST["acao"])){
    if($_POST["acao"]=="inserir"){
        inserirLivro();
    }
    if($_POST["acao"]=="alterar"){
        alterarLivro();
    }
    if($_POST["acao"]=="excluir"){
        excluirLivro();
    }
}
//Função para abrir banco a conexão com o banco de dados
function abrirBanco(){
    //Entre os dados informados: ip do servidor, usuario do banco, senha do banco, nome do banco
    $conexao = new mysqli("localhost", "root", "", "livraria");
    return $conexao;
}

function inserirLivro(){
    //Variável de conexão com o banco
    $banco = abrirBanco();
    //A variável sql receberá a consulta que irá inserir os dados do livro no banco
    $sql = "INSERT INTO livro(nome, qtde_pagina, preco, autor, editora) "
            . "VALUES ('{$_POST["nome"]}','{$_POST["qtde_pagina"]}','{$_POST["preco"]}',"
            . "'{$_POST["autor"]}','{$_POST["editora"]}')";
    //E então está consulta será inserida no banco        
    $banco->query($sql);
    //E a conexão é fechada
    $banco->close();
    voltarIndex();
}
//Esta função é muito semelhante a função acima, o que altera é a consulta que ao invés de 
//INSERT é o UPDATE
function alterarLivro(){
    $banco = abrirBanco();
    $sql = "UPDATE livro SET nome='{$_POST["nome"]}',qtde_pagina='{$_POST["qtde_pagina"]}',preco='{$_POST["preco"]}',"
            . "autor='{$_POST["autor"]}',editora='{$_POST["editora"]}' WHERE id_livro = '{$_POST["id_livro"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}
//Esta função também é semelhante as demais, o que altera é a consulta que faz o DELETE do registro
function excluirLivro(){
    $banco = abrirBanco();
    $sql = "DELETE FROM livro WHERE id_livro = '{$_POST["id_livro"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}
//Esta difere um pouco onde ela utiliza um laço de repetiçãopara mostrar todos os arquivos
function mostrarLivros(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM livro ORDER BY id_livro";
    $resultado = $banco->query($sql);
    $banco->close();
    //A função mysqli_fetch_array separá o resultado da consulta linha por linha armazenando
    //o conteúdo na variável row, e então cada linha é armazenada no array grupo, e então é
    //ela é retornada
    while ($row = mysqli_fetch_array($resultado)){
        $grupo[] = $row;
    }
    return $grupo;
}
//Esta função é muito parecida com a função acima com algumas diferenças, pois ela recebe como parâmetro
//o id_livro que o usuário deseja que seja alterado
function mostrarIdLivro($id_livro){
    $banco = abrirBanco();
    //A consulta buscará o livro pelo id que o usuário digitou
    $sql = "SELECT * FROM livro WHERE id_livro =".$id_livro;
    $resultado = $banco->query($sql);
    $banco->close();
    //Função para associar o resultado da função
    $livro = mysqli_fetch_assoc($resultado);
    return $livro;
}
//Esta função é usada para retornar a página inicial
function voltarIndex(){
    header("Location:index.php");
}
?>