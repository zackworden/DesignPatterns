<?php
// const
	
// var
	
// class
	abstract class AbstractCarFactory
	{
		function Get_Engine()
		{
		}
		function Get_HoodOrnament()
		{
		}
	}
	class MustangFactory extends AbstractCarFactory
	{
		function Get_Engine()
		{
			return new MustangEngine();
		}
		function Get_HoodOrnament()
		{
			return new HoodOrnament_Ford();
		}
	}
	class MinivanFactory extends AbstractCarFactory
	{
		function Get_Engine()
		{
			return new MinivanEngine();
		}
		function Get_HoodOrnament()
		{
			return new HoodOrnament_Dodge();
		}
	}
	class JeepFactory extends AbstractCarFactory
	{
		function Get_Engine()
		{
			return new JeepEngine();
		}
		function Get_HoodOrnament()
		{
			return new HoodOrnament_Jeep();
		}
	}
	
	// engine types
	abstract class AbstractEngine
	{
		public $name = 'An engine';
		public $horsePower = 150;
		public $fuelEfficiency = .5;
	}
	class MustangEngine extends AbstractEngine
	{
		public $name = 'An powerful engine';
		public $horsePower = 350;
		public $fuelEfficiency = .3;
	}
	class MinivanEngine extends AbstractEngine
	{
		public $name = 'A family-friendly powerful engine';
		public $horsePower = 100;
		public $fuelEfficiency = .7;
	}
	class JeepEngine extends AbstractEngine
	{
		public $name = 'An rugged engine';
		public $horsePower = 200;
		public $fuelEfficiency = .4;
	}
	
	// hood ornament types
	abstract class AbstractOrnament
	{
		public $name = 'A hood ornament';
		public $location = 'The Hood';
	}
	class HoodOrnament_Ford extends AbstractOrnament
	{
		public $name = 'A Ford ornament';
	}
	class HoodOrnament_Jeep extends AbstractOrnament
	{
		public $name = 'A Jeep ornament';
	}
	class HoodOrnament_Dodge extends AbstractOrnament
	{
		public $name = 'A Dodge ornament';
	}
	
	
// function
	function Print_EngineStats( AbstractEngine $engine )
	{
		echo '<p>';
		echo 'Engine Name: <br />';
		echo $engine->name;
		echo '<br />';
		echo 'Horse Power: <br />';
		echo $engine->horsePower;
		echo '<br />';
		echo 'Fuel Efficiency: <br />';
		echo $engine->fuelEfficiency;
		echo '<br />';
		echo '</p>';
	}
// run
	$mustangEngineFactory = new MustangFactory();
	$engine = $mustangEngineFactory->Get_Engine();
	
	Print_EngineStats($engine);
	
	$jeepEngineFactory = new JeepFactory();
	$engine = $jeepEngineFactory->Get_Engine();
	Print_EngineStats($engine);
	
	$minivanEngineFactory = new MinivanFactory();
	$engine = $minivanEngineFactory->Get_Engine();
	Print_EngineStats($engine);
	
	
?>
.