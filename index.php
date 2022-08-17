<?php 

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/CartaController.php';

switch($uri_parse)
{
    case '/yugioh':
        CartaController::index();
    break;
    
    case '/yugioh/form':
        CartaController::form();
    break;

    case '/yugioh/form/save':
        CartaController::save();
    break;
    
    case '/yugioh/delete':
        CartaController::delete();
    break;

    default:
    echo "Erro 404";
    break;
}