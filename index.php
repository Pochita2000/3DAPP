<?php

// includes 
require_once 'views/load.php';
require_once 'models/model.php';
require_once 'controllers/controller.php';
$pageURI =$_SERVER['REQUEST_URI'];
$pageURI =substr($pageURI,strrpos($pageURI,'index.php')+10);
	if (!$pageURI)
		new Controller('home');
	else
		new Controller($pageURI);
?>