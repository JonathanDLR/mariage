<?php
session_start(); 
require($_SERVER['DOCUMENT_ROOT'].'/router/Router.php');

$router = new Router();

$router->route();
?>