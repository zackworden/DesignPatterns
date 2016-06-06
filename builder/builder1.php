<?php
// const
	
// var
	
// class
	class Client
	{
		function DescribeRobot( $robotName, Robot $r )
		{
			echo '
			<p>
			<b>' . $robotName . '</b><br />
			CPU: ' . $r->getCpu() . ' <br />
			Armor: ' . $r->getArmor() . ' <br />
			Weapon: ' . $r->getWeapon() . ' <br />
			</p>
			';
		}
	}
	
	class RobotDirector
	{
		private $builder;
		
		function __construct(AbstractRobotBuilder $rb)
		{
			$this->builder = $rb;
		}
		function BuildRobot()
		{
			$this->builder->BuildCpu();
			$this->builder->BuildArmor();
			$this->builder->BuildWeapon();
		}
		function GetRobot()
		{
			return $this->builder->GetResult();
		}
	}
	class AbstractRobotBuilder
	{
		function BuildCpu()
		{
		}
		function BuildArmor()
		{
		}
		function BuildWeapon()
		{
		}
		function GetResult()
		{
			return $this->theRobot;
		}
	}
	class OldRobotBuilder extends AbstractRobotBuilder
	{
		private $theRobot;
		
		function __construct()
		{
			$this->theRobot = new Robot();
		}
		function BuildCpu()
		{
			$this->theRobot->setCpu('Vacuum Tube CPU');
		}
		function BuildArmor()
		{
			$this->theRobot->setArmor('Solid Steel');
		}
		function BuildWeapon()
		{
			$this->theRobot->setWeapon('Raygun');
		}
		function GetResult()
		{
			return $this->theRobot;
		}
	}
	class CylonBuilder extends AbstractRobotBuilder
	{
		private $theRobot;
		
		function __construct()
		{
			$this->theRobot = new Robot();
		}
		function BuildCpu()
		{
			$this->theRobot->setCpu('Multiphasic CPU');
		}
		function BuildArmor()
		{
			$this->theRobot->setArmor('Depleted Uranium');
		}
		function BuildWeapon()
		{
			$this->theRobot->setWeapon('Miniature Railgun');
		}
		function GetResult()
		{
			return $this->theRobot;
		}
	}
	class OrganicCylonBuilder extends AbstractRobotBuilder
	{
		private $theRobot;
		
		function __construct()
		{
			$this->theRobot = new Robot();
		}
		function BuildCpu()
		{
			$this->theRobot->setCpu('Quantum / Cellular CPU');
		}
		function BuildArmor()
		{
			$this->theRobot->setArmor('Flesh Substitute');
		}
		function BuildWeapon()
		{
			$this->theRobot->setWeapon('Infiltration');
		}
		function GetResult()
		{
			return $this->theRobot;
		}
	}
	
	class Robot
	{
		public $cpu;
		public $armor;
		public $weapon;
		
		function setCpu( $c )
		{
			$this->cpu = $c;
		}
		function getCpu()
		{
			return $this->cpu;
		}
		function setArmor( $a )
		{
			$this->armor = $a;
		}
		function getArmor()
		{
			return $this->armor;
		}
		function setWeapon( $w )
		{
			$this->weapon = $w;
		}
		function getWeapon()
		{
			return $this->weapon;
		}
	}
// function
	
// run
	// create all builder classes
	$oldRobotPlans = new OldRobotBuilder();
	$cylonPlans = new CylonBuilder();
	$organicCylonPlans = new OrganicCylonBuilder();
	
	// create director
	$robotDirector = new RobotDirector( $oldRobotPlans );
	$robotDirector->BuildRobot();
	$legacyBot = $robotDirector->GetRobot();
	
	// create new robot type
	$robotDirector = new RobotDirector( $cylonPlans );
	$robotDirector->BuildRobot();
	$humanoidCylon = $robotDirector->GetRobot();
	
	// create last robot type
	$robotDirector = new RobotDirector( $organicCylonPlans );
	$robotDirector->BuildRobot();
	$cylon = $robotDirector->GetRobot();
	
	
	$client = new Client();
	$client->DescribeRobot('legacyBot 1.1',$legacyBot);
	$client->DescribeRobot('Humanoid Cylon',$humanoidCylon);
	$client->DescribeRobot('Cylon',$cylon);
?>