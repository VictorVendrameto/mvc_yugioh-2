<?php

class CartaController
{
    public static function index()
    {
        include 'Model/CartaModel.php';

        $model = new CartaModel();
        $model->getAllRows();

        include 'View/modules/Carta/CartaListar.php';
    }

    public static function form()
    {
        include 'Model/CartaModel.php';

        $model = new CartaModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);
        
        include 'View/modules/Carta/CartaCadastro.php';
    }
    

    public static function save()
    {
        include 'Model/CartaModel.php';

        $model = new CartaModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->nivel = $_POST['nivel'];
        $model->atributo = $_POST['atributo'];
        $model->tipo = $_POST['tipo'];
        $model->ponto_atk = $_POST['ponto_atk'];
        $model->ponto_def = $_POST['ponto_def'];

        $model->save();

        header("Location: /yugioh");
    }

    public static function delete()
    {
        include 'Model/CartaModel.php';

        $model = new CartaModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /yugioh");
    }
}