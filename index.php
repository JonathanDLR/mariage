<?php
session_start(); 
require($_SERVER['DOCUMENT_ROOT'].'/mariage/router/Router.php');

$router = new Router();

$router->route();
?>