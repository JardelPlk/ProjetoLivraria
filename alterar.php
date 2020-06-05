<?php
//Comandos para mostrar o livro especificado em uma tabela
include("conexao.php");
$livro = mostrarIdLivro($_POST["id_livro"]);
//var_dump($livro);Função utilizada para testar
?>
<!Comando para aceitar caracteres especiais!>
<meta charset="UTF-8">
<!Fomulário utilizado para receber os dados do livro digitados pelo usuário!>
<form name="dadosLivro" action="conexao.php" method="POST">
    <table border="1">
        <tbody>
             <!Basicamente temos aqui a mesma estrutura do arquivo inserir mas tendo
            algumas diferenças como o value que vai apresentar o nome da variavel 
            ja existente e o size nas variáveis do tipo texto delimitando o tamanho
            E lembrando que o id não poderá ser alterado!>
            <tr>
                <td>Nome do livro:</td>
                <td><input type="text" name="nome" value="<?=$livro["nome"]?>" size="50"/></td>
            </tr>
            <tr>
                <td>Quantidade de páginas:</td>
                <td><input type="number" name="qtde_pagina" value="<?=$livro["qtde_pagina"]?>" /></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" step="0.01" name="preco" value="<?=$livro["preco"]?>" /></td>
            </tr>
            <tr>
                <td>Nome do autor:</td>
                <td><input type="text" name="autor" value="<?=$livro["autor"]?>" size="50"/></td>
            </tr>
            <tr>
                <td>Nome da editora:</td>
                <td><input type="text" name="editora" value="<?=$livro["editora"]?>" size="50"/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="alterar" />
                    <input type="hidden" name="id_livro" value="<?=$livro["id_livro"]?>" />
                </td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>
