<?php

	namespace src\Controllers;

	use src\Models\CircleModel;
	use src\Models\ContainerModel;
	use src\Models\SquareModel;
	use src\Services\ContainerCalculator;

	class ContainerController
	{
		/**
		 * @return string
		 */
		public function index()
		{
			//In case we need more containers in future, we will just add them in this array.
			//No other place to touch.
			$containers = [
				new ContainerModel(300, 200), //width * length
				new ContainerModel(100, 100)  //width * length
			];

			//In case we need more transport in future, we will just add them here.
			//No other place to touch.
			$transport_1 = [
				new CircleModel(50),            //radius
				new CircleModel(50),            //radius
				new SquareModel(100, 100) //width * length
			];

			$transport_2 = [
				new SquareModel(400, 400), //width * length
				new CircleModel(100)             //radius
			];

			$transport_3 = [
				new SquareModel(150, 100), //width * length
				new SquareModel(50, 50),   //width * length
				new CircleModel(50)              //radius
			];

			//Return results
			return (new ContainerCalculator($transport_3, $containers))->results();
		}
	}