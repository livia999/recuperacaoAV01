<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>
    <center>
    <fieldset>
    <form action="acao.php" method="POST">
        <label for="l_idLivro">ID:</label>
        <input type="text" name="l_idLivro">

        <label for="l_titulo">Título do Livro:</label>
        <input type="text" name="l_titulo">

        <label for="l_ano_publicacao">Data de publicação:</label>
        <input type="text" name="l_ano_publicacao">

        <label for="l_isdn">ISDN:</label>
        <input type="text" name="l_isdn">

        <label for="l_preco">Preço:</label>
        <input type="text" name="l_preco">

        <br><br>

        <input type="submit" name="acao" value="salvar">
    </form>
    </fieldset>
    </center>
</body>
</html>