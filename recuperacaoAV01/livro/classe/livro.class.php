<?php

class Livro{

    private $l_idLivro;
    private $l_titulo;
    private $l_ano_publicacao;
    private $l_isdn;
    private $l_preco;



    public function __construct($l_idLivro, $l_titulo, $l_ano_publicacao, $l_isdn, $l_preco){

        $this->l_idLivro = $l_idLivro;
        $this->l_titulo = $l_titulo;
        $this->l_ano_publicacao = $l_ano_publicacao;
        $this->l_isdn = $l_isdn;
        $this->l_preco = $l_preco;

    }

    public function getId(){ return $this->l_idLivro; }
        public function setId($l_idLivro){
            if ($l_idLivro > 0 && $l_idLivro <> "")
            $this->l_idLivro = $l_idLivro;
            else throw new Exception("Id inválido: " .$l_idLivro);
        }

    public function getTitulo(){ return $this->l_titulo; }
        public function setTitulo($l_titulo){
            if ($l_titulo > 0 && $l_titulo <> "")
            $this->$l_titulo = $l_titulo;
            else throw new Exception("Título inválido: " .$l_titulo);
        }

    public function getAnoPublicacao(){ return $this->l_ano_publicacao; }
        public function setAnoPublicacao($l_ano_publicacao){
            if ($l_ano_publicacao > 0 && $l_ano_publicacao <> "")
            $this->l_ano_publicacao = $l_ano_publicacao;
            else throw new Exception("Ano de Publicação inválido: " .$l_ano_publicacao);
        }

    public function getISDN(){ return $this->l_isdn; }
        public function setISDN($l_isdn){
            if ($l_isdn > 0 && $l_isdn <> "")
            $this->l_isdn = $l_isdn;
            else throw new Exception("Data de nascimento inválida: " .$l_isdn);
        }

    public function getPreco(){ return $this->l_preco; }
        public function setPreco($l_preco){
            if ($l_preco > 0 && $l_preco <> "")
            $this->l_preco = $l_preco;
            else throw new Exception("Preço inválido: " .$l_preco);
        }
        
    public function buscar($l_idLivro){

        require_once("conf/Conexao.php");

        $conexao = Conexao::getInstance();

$query = 'SELECT * FROM Livro';
if($l_idLivro > 0){
        $query .= 'WHERE l_idLivro =  :l_idLivro';
        $stmt->bindParam(':l_idLivro', $l_idLivro);
}
        $stmt = $conexao->prepare($query);
        if($stmt->execute())
            return $stmt->fetchAll();

            return false;
    }

}

?>