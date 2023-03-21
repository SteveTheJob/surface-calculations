<?php

	namespace src\Models;

	use src\Interfaces\ContainerInterface;

	class ContainerModel implements ContainerInterface
	{
		 private $width;
		 private $length;

		/**
		 * @param $width
		 * @param $length
		 */
		 public function __construct($width, $length)
		 {
			 $this->width  = $width;
			 $this->length = $length;
		 }

		 /**
		  * @return double
		  */
		 public function get_width()
		 {
			 return $this->width;
		 }

		 /**
		  * @return double
		  */
		 public function get_length()
		 {
			 return $this->length;
		 }

		 /**
		  * @return double
		  */
		 public function get_area()
		 {
			 return $this->length * $this->width;
		 }

		/**
		 * @return string
		 */
		public function get_unique_key()
		{
			return $this->get_width()."*".$this->get_length();
		}
	}
