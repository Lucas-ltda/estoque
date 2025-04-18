<?php 

Class produtoRepositorio{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {   
        $this-> pdo = $pdo;
    }

    public function formarObjeto($dados){
        return new Produto($dados ['id'],
            $dados['nome'],
            $dados['quantidade'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem']);  
        }
        
        
    public function consultarProdutos():array{
        $sqlQuery =  "SELECT * FROM produtos";
        $statement = $this-> pdo -> query($sqlQuery);
        $resultQuery = $statement -> fetchAll(PDO::FETCH_ASSOC);
        
        $dadosProduto = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$resultQuery);
        return $dadosProduto;
    }

    public function excluir(int $id){
        $sqlQuery = "DELETE FROM produtos WHERE id = ?";
        $statement  = $this->pdo ->prepare($sqlQuery);
        $statement -> bindValue(1,$id);
        $statement -> execute();
    }

    public function salvar(Produto $produto){
        $sqlQuery = "INSERT INTO produtos (nome,quantidade,descricao,imagem,preco) VALUES (?,?,?,?,?);";
        $statement = $this ->pdo->prepare($sqlQuery);
        $statement -> bindValue(1,$produto -> getNome());
        $statement -> bindValue(2,$produto -> getQuantidade());
        $statement -> bindValue(3,$produto -> getDescricao());
        $statement -> bindValue(4,$produto -> getImagem());
        $statement -> bindValue(5,$produto -> getPreco());
        $statement -> execute();
    }

    public function buscar(int $id){
        $sqlQuery = "SELECT * FROM produtos where id = ?";
        $statement = $this->pdo -> prepare($sqlQuery);
        $statement -> bindValue(1,$id);
        $statement -> execute();

        $resultQuery = $statement -> fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($resultQuery);
    }

    public function atualizar(Produto $produto){
        $sqlQuery = "UPDATE produtos set nome = ?, quantidade = ? ,descricao = ?, imagem = ?,preco = ? where id = ?";
        $statement = $this->pdo ->prepare($sqlQuery); 
        $statement -> bindValue(1,$produto -> getNome());
        $statement -> bindValue(2,$produto -> getQuantidade());
        $statement -> bindValue(3,$produto -> getDescricao());
        $statement -> bindValue(4,$produto -> getImagem());
        $statement -> bindValue(5,$produto -> getPreco());
        $statement -> bindValue(6,$produto -> getId());
        $statement -> execute();
    }
}

?>