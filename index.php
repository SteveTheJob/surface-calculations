<?php

	use src\Controllers\ContainerController;

	require_once realpath("vendor/autoload.php");

	//results
	echo (new ContainerController())->index();
