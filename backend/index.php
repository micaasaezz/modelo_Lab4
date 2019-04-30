<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, text/plain, application/x-www-form-urlencoded");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/* INSERT INTO `autos`( `id`, `modelo`, `marca`, `precio`, `cantidadPuertas`, `RutaDeFoto` ) VALUES( 1, 'Camaro', 'Chevrolet', 20000, 'cinco', 'aux.png' ),( 2, 'Duna', 'Fiat', 25000, 'tres', 'aux.png' ),( 3, '207', 'Renaut', 30000, 'cinco', 'aux.png' ) */

require_once './vendor/autoload.php';
require_once './clases/Auto.php';
require_once './clases/AutoApi.php';
/* require_once './clases/Usuario.php';
require_once './clases/UsuarioApi.php';
require_once './clases/Media.php';
require_once './clases/MediaApi.php';
require_once './clases/Middleware.php';
require_once './clases/LoginApi.php'; */

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$app = new \Slim\App(["settings" => $config]);

$app->post('[/]', \AutosApi::class . '::CargarAuto');
$app->get('[/]', \AutosApi::class . '::MostrarAutos');
$app->post('/remove', \AutosApi::class . '::BorrarAuto');

/*Modificacion de Medias*/
// $app->put('[/]', \MediaApi::class.'::ModificarMedia')->add(\MW::class.":VerificarPermisosEncargado");

$app->run();
