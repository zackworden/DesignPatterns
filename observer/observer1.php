<?php
// class
	
	// subjects
	abstract class AbstractSubject
	{
		public $label = 'Default label';
		public $observers = [];
		public $state = 'Default State';
		
		function Attach( $observer )
		{
			array_push( $this->observers, $observer );
		}
		function Detach( $observer )
		{
			$counter = 0;
			$numOfObservers = count( $this->observers );
			
			for ( $counter = 0; $counter < $numOfObservers; $counter ++ )
			{
				if ( $this->observers[$counter] === $observer )
				{
					array_splice($this->observers, $counter, 1);
				}
			}
		}
		function Notify()
		{
			foreach ( $this->observers as $thisObserver )
			{
				$thisObserver->Update( $this );
			}
		}
		function GetState()
		{
			return $this->state;
		}
		function SetState( $newState )
		{
			$this->state = $newState;
		}
	}
	class ZooSubject extends AbstractSubject
	{
		public $label = 'Default label';
		public $observers = [];
		public $state = 'Default State';
		
		function __construct( $label, $state )
		{
			$this->label = $label;
			$this->state = $state;
		}
		function Describe()
		{
			echo $this->label . ': ' . $this->state . '<br />';
		}
	}
	
	// observers
	abstract class AbstractObserver
	{
		function Update( AbstractSubject $s )
		{
		}
	}
	class Zookeeper extends AbstractObserver
	{
		public $label;
		
		function __construct( $label )
		{
			$this->label = $label;
		}
		function Update( AbstractSubject $s )
		{
			echo $this->label . ' was notified by ' . $s->label . '<br />';
			$s->SetState( $this->label . ' spotted the ' . $s->label . '!');
		}
	}
// run
	// create some ZooSubject objects / subjects
	$jaguar = new ZooSubject('Jaguar', 'napping');
	$penguin = new ZooSubject('Penguin','Doing something stupid');
	
	// create some ZooKeeper objects / observers
	$zooKeeper1 = new Zookeeper('Fred the zookeeper');
	$zooKeeper2 = new Zookeeper('Bob the zookeeper');
	
	// attach zookeeper objects to the subjects
	$jaguar->Attach( $zooKeeper1 );
	$penguin->Attach( $zooKeeper1 );
	$penguin->Attach( $zooKeeper2 );
	
	// Describe() the jaguars initial state, notify its observer, then describe its new state
	$jaguar->Describe();
	$jaguar->Notify();
	$jaguar->Describe();
	echo '<br /><br />';
	
	// Describe() the penguins initial state, notify its two observers, then describe its new state
	$penguin->Describe();
	$penguin->Notify();
	$penguin->Describe();
	echo '<br /><br />';
?>
.