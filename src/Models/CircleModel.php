<?php

	namespace src\Models;

	class CircleModel extends SquareModel
	{
		/**
		 * @param $radius
		 */
		public function __construct($radius)
		{
			//I treat circles as squares with the width equal to the length;
			parent::__construct(($radius * 2), ($radius * 2));
		}
	}