<?php
// const
	
// var
	
// class
	class Client
	{
		
	}
	
	class AbstractSatellite
	{
		public $name;
		public $speed;
		public $AUsFromEarth;
		
		function Describe()
		{
			echo '<p>';
			echo 'Satellite' . '<br />';
			echo 'Name: ' . $this->name . '<br />';
			echo 'Speed: ' . $this->speed . 'Light Years Per Year' . '<br />';
			echo 'Distance: ' . $this->AUsFromEarth . ' AUs' . '<br />';
			echo '</p>';
		}
		function CloneMe()
		{
			
		}
	}
	class Satellite extends AbstractSatellite
	{
		public $name;
		public $speed;
		public $AUsFromEarth;
		
		function __construct( $satellite = null )
		{
			if ( $satellite !== null )
			{
				$this->name = $satellite->name;
				$this->speed = $satellite->speed;
				$this->AUsFromEarth = $satellite->AUsFromEarth;
			}
			else
			{
				$this->name = 'A generic satellite';
				$this->speed = .56;
				$this->AUsFromEarth = 0;
			}
		}
		function CloneMe()
		{
			return new Satellite( $this );
		}
	}
// function
	
// run
	$voyager = new Satellite();
	$vger = $voyager->CloneMe();
	$vger->name = "V'Ger";
	
	$voyager->Describe();
	$vger->Describe();
	
	$vger2 = $vger->CloneMe();
	$vger2->Describe();
?>
.