<?php
require 'vendor/autoload.php';

session_start();

if(!file_exists('config.php')) 
{
	$mysql['server'] = 'localhost';
	$mysql['user'] = 'root';
	$mysql['password'] = 'root';
	$mysql['database'] = 'test';
	$application['redirect'] = 'slim-webinar/';
} else {
	require_once 'config.php';
}

$app = new \Slim\Slim([
	'debug' => true,
	'templates.path' => './views'
]);

ORM::configure('mysql:host='.$mysql['server'].';dbname='.$mysql['database']);
ORM::configure('username', $mysql['user']);
ORM::configure('password', $mysql['password']);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$app->hook('slim.before', function () use ($app) {
    $posIndex = strpos( $_SERVER['PHP_SELF'], '/index.php');
    $baseUrl = substr( $_SERVER['PHP_SELF'], 0, $posIndex);
    $app->view()->appendData(array('baseUrl' => $baseUrl ));
});

$app->get('/', function () use($app) {
    $app->render('form.php');
});

$app->post('/', function() use($app, $application) {
	// Inserting a Record
	$user = ORM::for_table('users')->create();

	$user->nombre = cleanPost('nombre');
	$user->edad = cleanPost('edad');
	$user->email = cleanPost('email');
	$user->pais = cleanPost('pais');
	$user->profesion = cleanPost('profesion');
	$user->interes = cleanPost('interes');

	$user->save();

	$app->flash('success', 'Ye te hemos registrado para el siguiente webinar.');
	$app->response->redirect($application['redirect'], 303);

});

function cleanPost($name) 
{
	return (isset($_POST[$name])) ? $_POST[$name] : '';
}

$app->run();