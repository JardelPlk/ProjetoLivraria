<?php
//Incluindo o arquivo conexao ao index para utilizar as funções dele
include("conexao.php");
//grupo é uma variável do tipo array que armazena os livros cadastrados
$grupo = mostrarLivros();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Cadastro Livro</h1>
        <!Link para o arquivo inserir.php!>
        <a href="inserir.php">Adicionar Livro<br><br></a>
        <!Abaixo está toda a estrutura da tabela!>
        <table border="1">
            <thead>
                <tr>
                    <!Os nomes das colunas da tabela!>
                    <th>Id</th>
                    <th>Nome do Livro</th>
                    <th>Quantidade de páginas</th>
                    <th>Preço</th>
                    <th>Nome do autor</th>
                    <th>Nome da editora</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Aqui está o conteúdo das colunas da tabela
                //A função foreach pega todo o conteúdo do array grupo e separa linha por linha
                //com a variável livro
                foreach ($grupo as $livro){ ?>
                    <tr>
                        <td><?=$livro["id_livro"]?></td>
                        <td><?=$livro["nome"]?></td>
                        <td><?=$livro["qtde_pagina"]?></td>
                        <td><?=$livro["preco"]?></td>
                        <td><?=$livro["autor"]?></td>
                        <td><?=$livro["editora"]?></td>
                        <!Este é um botão de editar que levará até o arquivo alterar.php!>
                        <td><form name="alterar" action="alterar.php" method="POST">
                                <input type="hidden" name="id_livro" value=<?=$livro["id_livro"]?> />
                                <input type="submit" value="Editar" name="editar" />
                            </form></td>
                        <!Este também é um botão só que de excluir que levará até até o arquivo conexao.php!>
                        <td><form name="excluir" action="conexao.php" method="POST">
                                <input type="hidden" name="id_livro" value="<?=$livro["id_livro"]?>" />
                                <input type="hidden" name="acao" value="excluir" />
                                <input type="submit" value="Excluir" name="excluir" />
                            </form></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </body>
</html>
