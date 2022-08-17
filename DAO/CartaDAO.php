<?php

class CartaDAO
{
    private $conexao;
    

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_yugioh";
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    public function insert(CartaModel $model)
    {
        $sql = "INSERT INTO cartas_yugi (nome, nivel, atributo, tipo, ponto_atk, ponto_def) VALUES(?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->nivel);
        $stmt->bindValue(3, $model->atributo);
        $stmt->bindValue(4, $model->tipo);
        $stmt->bindValue(5, $model->ponto_atk);
        $stmt->bindValue(6, $model->ponto_def);

        $stmt->execute();
    }

    public function update(CartaModel $model)
    {
        $sql = "UPDATE cartas_yugi SET nome=?, nivel=?, atributo=?, tipo=?, ponto_atk=?, ponto_def=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->nivel);
        $stmt->bindValue(3, $model->atributo);
        $stmt->bindValue(4, $model->tipo);
        $stmt->bindValue(5, $model->ponto_atk);
        $stmt->bindValue(6, $model->ponto_def);
        $stmt->bindValue(7, $model->id);
        
        $stmt->execute();
    }

    public function select()
    {
        $sql =  "SELECT id, nome, nivel, atributo, tipo, ponto_atk, ponto_def FROM cartas_yugi";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        include_once 'Model/CartaModel.php';

        $sql = "SELECT id, nome, nivel, atributo, tipo, ponto_atk, ponto_def FROM cartas_yugi WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CartaModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM cartas_yugi WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CartaModel");
    }
}