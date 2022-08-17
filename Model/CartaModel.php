<?php

class CartaModel
{
    public $id, $nome, $nivel, $atributo, $tipo, $ponto_atk, $ponto_def;

    public $rows;

    public function save()
    {
        include 'DAO/CartaDAO.php';
        $dao = new CartaDAO();

        if(empty($this->id))
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/CartaDAO.php';

        $dao = new CartaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/CartaDAO.php';

        $dao = new CartaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CartaModel();
    }

    public function delete(int $id)
    {
        include 'DAO/CartaDAO.php';

        $dao = new CartaDAO();

        $dao->delete($id);
        
    }
}