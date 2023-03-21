<?php

	namespace src\Interfaces;

	interface ShapeInterface
	{
		//Every Shape/Object type must have it is area calculated.
		/**
		 * @return double
		 */
		public function get_area();
	}