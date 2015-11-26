<?php
	require_once 'vendors/Required.php';
	use Vendors\Required;
	Required::once('vendors.*');
	Required::once('App.Models.*');
	Required::once('App.Controllers.*');
	require_once 'App/route.php';
	require_once 'App/functions.php';

	use Vendors\Server;
	Server::init();
?>