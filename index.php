<?php

session_start();
require('./db.php');	
require('./constants.php');
require('./controllers/BaseAccessController.php');

$conn = new Db();

foreach (glob('./models/*') as $model_name) {
	require($model_name);
}

foreach (glob('./classes/*') as $class_name) {
	require($class_name);
}


$request = new Request();
$router = new Router($request);
