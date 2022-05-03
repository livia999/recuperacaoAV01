<?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "classe/livro.class.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $l_idLivro = isset($_GET['l_idLivro']) ? $_GET['l_idLivro'] : 0;
        excluir($l_idLivro);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $l_idLivro = isset($_POST['l_$l_idLivro']) ? $_POST['l_$l_idLivro'] : "";
        if ($l_idLivro == 0)
            inserir($l_idLivro);
        else
            editar($l_idLivro);
    }

   
    function inserir($l_idLivro){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO Livro (l_titulo, l_ano_publicacao, l_isdn, l_preco) VALUES(:l_titulo, :l_ano_publicacao, :l_isdn, :l_preco)');
        $l_titulo = $dados['l_titulo'];
        $stmt->bindParam(':l_titulo', $l_titulo, PDO::PARAM_STR);

        $l_ano_publicacao = $dados['l_ano_publicacao'];
        $stmt->bindParam(':l_ano_publicacao', $l_ano_publicacao, PDO::PARAM_STR); 

        $l_isdn = $dados['l_isdn'];
        $stmt->bindParam(':l_isdn', $l_isdn, PDO::PARAM_STR);

        $l_preco = $dados['l_preco'];
        $stmt->bindParam(':l_preco', $l_preco, PDO::PARAM_STR);

        $stmt->execute();
        header("location:cad.php");
        
    }

    function editar($l_idLivro){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE Livro SET l_titulo = :l_titulo, l_ano_publicacao = :l_ano_publicacao, l_isdn = :l_isdn, l_preco = :l_preco WHERE l_idLivro = :l_idLivro');
        $l_titulo = $dados['l_titulo'];
        $stmt->bindParam(':l_titulo', $l_titulo, PDO::PARAM_STR);

        $l_ano_publicacao = $dados['l_ano_publicacao'];
        $stmt->bindParam(':l_ano_publicacao', $l_ano_publicacao, PDO::PARAM_STR);

        $l_isdn = $dados['l_isdn'];
        $stmt->bindParam(':l_isdn', $l_isdn, PDO::PARAM_STR);

        $l_preco = $dados['l_preco'];
        $stmt->bindParam(':l_preco', $l_preco, PDO::PARAM_STR);

        $stmt->execute();
        header("location:index.php");
    }

    function excluir($l_idLivro){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from Livro WHERE l_idLivro = :l_idLivro');
        $stmt->bindParam(':l_idLivro', $l_idLivro, PDO::PARAM_INT);
        $l_idLivro = $l_idLivro;
        $stmt->execute();
        header("location:index.php");
        
        //echo "Excluir".$l_idLivro;

    }
    
    // Busca um item pelo código no BD
    function buscarDados($l_idLivro){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM Livro WHERE l_idLivro = $l_idLivro");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['l_idLivro'] = $linha['l_idLivro'];
            $dados['l_titulo'] = $linha['l_titulo'];
            $dados['l_ano_publicacao'] = $linha['l_ano_publicacao'];
            $dados['l_isdn'] = $linha['l_isdn'];
            $dados['l_preco'] = $linha['l_preco'];
        }
        //var_dump($dados);
        return $dados;
    }
    
    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['l_idLivro'] = $_POST['l_idLivro'];
        $dados['l_titulo'] = $_POST['l_titulo'];
        $dados['l_ano_publicacao'] = $_POST['l_ano_publicacao'];
        $dados['l_isdn'] = $_POST['l_isdn'];
        $dados['l_preco'] = $_POST['l_preco'];
        return $dados;
    }
?>


<?php

require_once ("classe/livro.class.php");
require_once ("conf/default.inc.php");
require_once ("conf/Conexao.php");
require_once ("index.php");

function buscar($l_idLivro){

    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Livro WHERE l_idLivro = $l_idLivro");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['l_idLivro'] = $linha['l_idLivro'];
        $dados['l_titulo'] = $linha['l_titulo'];
        $dados['l_ano_publicacao'] = $linha['l_ano_publicacao'];
        $dados['l_isdn'] = $linha['l_isdn'];
        $dados['l_preco'] = $linha['l_preco'];
    }
    
    }
    
if($_POST["acao"] == "salvar"){
    $l_idLivro = isset($_POST['l_idLivro'])?$_POST['l_idLivro']:0;
    $l_titulo = isset($_POST['l_titulo'])?$_POST['l_titulo']:0;
    $l_ano_publicacao = isset($_POST['l_ano_publicacao'])?$_POST['l_ano_publicacao']:0;    
    $l_isdn = isset($_POST['l_isdn'])?$_POST['l_isdn']:0;
    $l_preco = isset($_POST['l_preco'])?$_POST['l_preco']:0;

}

?>
