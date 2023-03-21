<?php

	use src\Controllers\ContainerController;

	require_once realpath("vendor/autoload.php");

	$container_controller = new ContainerController();
	echo $container_controller->index();