<?php

	namespace src\Interfaces;

	interface ContainerInterface
	{
		//Every container type must have a unique key that identifies it.
		/**
		 * @return string
		 */
		public function get_unique_key();
	}