<?php

	namespace src\Services;

	use src\Models\ContainerModel;
	use src\Models\SquareModel;

	class ContainerCalculator
	{
		private $transport;
		private $containers;
		private $dic_results;
		private $does_not_fit = 'does_not_fit';

		/**
		 * @param $transport
		 * @param $containers
		 */
		public function __construct($transport, $containers)
		{
			$this->transport  = $transport;
			$this->containers = $containers;
		}

		/**
		 * @return string
		 */
		public function results()
		{
			$results = "\n";
			$this->sort_containers_in_asc();
			$this->initialize_results_dictionary();
			$this->calculate();

			/** @var SquareModel $shape */
			foreach ($this->dic_results as $key=>$value)
			{
				$results = $results. "Container:".$key.", Total:".$value."\n";
			}

			//Return results
			return $results."\n";
		}

		public function calculate()
		{
			//Looping all transport shapes/objects
			/** @var SquareModel $shape */
			foreach ($this->transport as $shape)
			{
				$found = false;

				//Looping all sorted containers to find a perfect shape much
				/** @var ContainerModel $container */
				foreach ($this->containers as $container)
				{
					if(($shape->get_length() <= $container->get_length() AND
						$shape->get_width()  <= $container->get_width())  OR
						($shape->get_length() <= $container->get_width() AND
						$shape->get_width()   <= $container->get_length()))
					{
						//Incrementing shape type number.
						$this->increase_number_of_containers($container->get_unique_key());
						$found = true;
						break;
					}
				}

				//if not container is find, then declare the shape as bigger than all available containers
				if(! $found)
				{
					$this->increase_number_of_containers($this->does_not_fit);
				}
			}
		}

		/**
		 * @param string $unique_key
		 */
		public function increase_number_of_containers($unique_key)
		{
			//Increase number of container type every time we find a shape much
			$this->dic_results[$unique_key] = ($this->dic_results[$unique_key] + 1);
		}

		public function initialize_results_dictionary()
		{
			//We initialise our result's dictionary with all available containers based on their unique key
			/** @var ContainerModel $container */
			foreach ($this->containers as $container)
			{
				$this->dic_results[$container->get_unique_key()] =  0;
			}

			$this->dic_results[$this->does_not_fit] =  0;
		}

		public function sort_containers_in_asc()
		{
			//We sort all our containers in ascending order (asc) based on the size of their area
			//The idea here is that when we start looping shapes, we will first check if they can fit on small containers while moving to bigger ones

			usort($this->containers,function($a, $b){
				return strtolower($a->get_area()) - strtolower($b->get_area());
			});
		}
	}