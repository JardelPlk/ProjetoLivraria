<?php
?>
<!Comando para aceitar caracteres especiais!>
<meta charset="UTF-8">
<!Fomulário utilizado para receber os dados do livro digitados pelo usuário!>
<form name="dadosLivro" action="conexao.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome do livro:</td>
                <td><input type="text" name="nome" value="" /></td>
            </tr>
            <tr>
                <td>Quantidade de páginas:</td>
                <td><input type="number" name="qtde_pagina" value="" /></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" step="0.01" name="preco" value="" /></td>
            </tr>
            <tr>
                <td>Nome do autor:</td>
                <td><input type="text" name="autor" value="" /></td>
            </tr>
            <tr>
                <td>Nome da editora:</td>
                <td><input type="text" name="editora" value="" /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="inserir" /></td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>
