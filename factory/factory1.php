<?php
// const
	
// var
	
// class
	class Client
	{
		
	}
	
	abstract class AbstractRobot
	{
		private $name;
		private $type;
		private $weapon;
		
		function __construct( $n, $t, $w )
		{
			$this->name = $n;
			$this->type = $t;
			$this->weapon = $w;
		}
		function Describe()
		{
			echo '<p>';
			echo 'Robot Name: ' . $this->name . '<br />';
			echo 'Robot Type: ' . $this->type . '<br />';
			echo 'Robot Weapon: ' . $this->weapon . '<br />';
			echo '</p>';
		}
	}
	class ConcreteRobot extends AbstractRobot
	{
	}
	
	class RaygunGothicRobotFactory
	{
		function GetRobot()
		{
			return new ConcreteRobot('R2D2','Communications Droid','Electric Shock');
		}
	}
	class FiftiesRobotFactory
	{
		function GetRobot()
		{
			return new ConcreteRobot('Galaga','Invader Droid','Death Ray');
		}
	}
// function
	
// run
	$robotFactory1 = new RaygunGothicRobotFactory();
	$r2d2 = $robotFactory1->GetRobot();
	$r2d2->Describe();
	
	$robotFactory2 = new FiftiesRobotFactory();
	$galaga = $robotFactory2->GetRobot();
	$galaga->Describe();
?>
.