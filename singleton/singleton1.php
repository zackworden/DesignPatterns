<?php
// const
	
// var
	
// class
	class Client
	{
		
	}
	
	class DeitySingleton
	{
		public $nameOfReligion;
		static $uniqueInstance;
		
		static function Instance()
		{
			//if ( !$this->uniqueInstance )
			if ( ! static::$uniqueInstance )
			{
				static::$uniqueInstance = new static();
			}
			return static::$uniqueInstance;
		}
		function GetNameOfReligion()
		{
			return $this->nameOfReligion;
		}
		protected function __construct()
		{
		}
	}
// function
	
// run
	$shiva = DeitySingleton::Instance();
	$shiva->nameOfReligion = 'Hindu';
	
	print_r($shiva);
	
	$shiva->nameOfReligion = 'Buddhism';
	print_r($shiva);
?>
.