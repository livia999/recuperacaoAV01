<!DOCTYPE html>
<?php 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
require_once ("classe/livro.class.php");

$title = "Lista de Livros";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 1;

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url; 
        }
    </script>
</head>
<body>   
<center>
    <a href="cad.php"><button>Novo</button></a>
    <br><br>
    <form method="post">
    <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
    <input type="submit" value="Pesquisar">
    <br><br>
        <legend>Método de pesquisa: </legend> <br>

        <input type="radio" name="tipo" value="1" <?php if ($tipo == 1){echo 'checked';}?>> 
        <label for="l_idLivro">ID do Livro</label>

        <input type="radio" name="tipo" value="2" <?php if ($tipo == 2){echo 'checked';}?>>
        <label for="l_titulo">Título do Livro</label>

        <input type="radio" name="tipo" value="3" <?php if ($tipo == 3){echo 'checked';}?>>
        <label for="l_ano_publicacao">Ano de Publicação</label>

        <input type="radio" name="tipo" value="4" <?php if ($tipo == 4){echo 'checked';}?>>
        <label for="l_isdn">ISDN</label>
    
        <input type="radio" name="tipo" value="5" <?php if ($tipo == 5){echo 'checked';}?>>
        <label for="l_preco">Preço</label>
        
    </form>
   
    <br>
   <table>
    <tr>
        <th>ID</th>
        <th>Título do Livro</th> 
        <th>Ano de Publicação</th> 
        <th>ISDN</th>
        <th>Preço</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>
    <?php 
    $pdo = Conexao::getInstance();

    if ($tipo == 1 )
    $consulta = $pdo->query("SELECT * FROM Livro
                             WHERE l_idLivro
                             LIKE '$consulta%'
                             ORDER BY l_idLivro");

    else if ($tipo == 2)
    $consulta = $pdo->query("SELECT * FROM Livro
                            WHERE  l_titulo
                            LIKE '$consulta%'
                            ORDER BY l_titulo");

    else if ($tipo == 3)
    $consulta = $pdo->query("SELECT * FROM Livro
                            WHERE  l_ano_publicacao
                            LIKE '$consulta%'
                            ORDER BY l_ano_publicacao");

    else if ($tipo == 4)
    $consulta = $pdo->query("SELECT * FROM Livro
                            WHERE   l_isdn
                            LIKE '$consulta%'
                            ORDER BY l_isdn");

    else if ($tipo == 5)
    $consulta = $pdo->query("SELECT * FROM Livro
                            WHERE  l_preco
                            LIKE '$consulta%'
                            ORDER BY l_preco");

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr>
            <td><?php echo $linha['l_idLivro'];?></td>
            <td><?php echo $linha['l_titulo'];?></td>
            <td><?php echo $linha['l_ano_publicacao'];?></td>
            <td><?php echo $linha['l_isdn'] ?></td>
            <td><?php echo $linha['l_preco'];?></td>
            <td><a href='cad.php?acao=editar&l_idLivro=<?php echo $linha['l_idLivro'];?>'><img class="icon" src="../img/edit.png" alt=""></a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&l_idLivro=<?php echo $linha['l_idLivro'];?>')"><img class="icon" src="../img/delete.png" alt=""></a></td>
    </tr>
    <?php } ?>       
    </table>
    </center>
   </body>
</html>