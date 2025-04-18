<?php 

Class Produto{
    private ?int $id;
    private string $nome;
    private int $quantidade;
    private string $descricao;
    private float $preco;
    private string $foto;
 // criando a minha funcao construct
    function __construct(?int $id, string $nome,int $quantidade, string $descricao,float $preco, string $foto = 'logo-padrao.png'          )
    {
        $this -> id = $id;
        $this -> nome = $nome;
        $this -> quantidade = $quantidade;
        $this -> descricao = $descricao;
        $this -> preco = $preco;
        $this -> foto = !empty($foto) ? $foto : 'logo-padrao.png';
    }

    public function getId():int{
        return  $this -> id;
    }
    public function getNome():string {
        return $this -> nome; 
    }
    public function getQuantidade():int{
        return $this -> quantidade;
    }
    public function getDescricao():string{
        return $this -> descricao;
    }
    public function getPreco():float{
        return $this ->preco;
    }
    public function getImagem():string{
        return $this -> foto;
    }

    public function getImagemFormated(){
        return "img/" . (!empty($this->foto) ? $this->foto : 'logo-padrao.png');
    }

    public function getPrecoFormated():string{
        return "R$ ".number_format($this->preco,2);
    }

    function setImagem(string $foto){
        $this->foto = $foto;
    }
}


?>