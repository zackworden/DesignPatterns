<?php
// class
	class Client
	{
		function TestTelevision( $televisionName, $television )
		{
			$counter = 0;
			$numOf = 10;
			
			echo '<div style="padding:1em 0;">';
			echo '<h3>' . $televisionName . '</h3>';
			for ( $counter = 0; $counter < $numOf; $counter ++ )
			{
				$television->VolumeUp();
			}
			echo '</div>';
		}
	}
	
	// implementors
	class AbstractTelevision
	{
		public $imp;
		
		public $curVolume = 0;
		public $maxVolume = 5;
		
		function __construct( $imp )
		{
			$this->imp = $imp;
		}
		function VolumeUp()
		{
			$this->imp->Button_VolumeUp( $this );
		}
		function VolumeDown()
		{
			$this->imp->Button_VolumeDown( $this );
		}
	}
	class PlasmaTelevision extends AbstractTelevision
	{
		public $curVolume = 0;
		public $maxVolume = 8;
	}
	class CrtTelevision extends AbstractTelevision
	{
		public $curVolume = 1;
		public $maxVolume = 6;
	}
	
	// implementations
	class AbstractControlScheme
	{
		function Button_VolumeUp( $television ){}
		function Button_VolumeDown( $television ){}
	}
	class RemoteControl extends AbstractControlScheme
	{
		function Button_VolumeUp( $television )
		{
			echo 'Depressing button...' . '<br />';
			
			if ( $television->curVolume < $television->maxVolume )
			{
				$television->curVolume ++;
				echo 'Raising volume to ' . $television->curVolume . '<br />';
			}
			else
			{
				echo 'Volume is at max of ' . $television->curVolume . '!' . '<br />';
			}
			
			echo 'Releasing button!' . '<br />';
		}
		function Button_VolumeDown( $television )
		{
			echo 'Depressing button...' . '<br />';
			
			if ( $television->curVolume > 0 )
			{
				$television->curVolume --;
				echo 'Lowering volume to ' . $television->curVolume . '<br />';
			}
			else
			{
				echo 'Volume is already as low as it can go!' . '<br />';
			}
			
			echo 'Releasing button!' . '<br />';
		}
	}
	class TouchScreen extends AbstractControlScheme
	{
		function Button_VolumeUp( $television )
		{
			echo 'Tapping screen beginning...' . '<br />';
			
			if ( $television->curVolume < $television->maxVolume )
			{
				$television->curVolume ++;
				echo 'Raising volume to ' . $television->curVolume . '<br />';
			}
			else
			{
				echo 'Volume is at max of ' . $television->curVolume . '!' . '<br />';
			}
			
			echo 'Tapping screen finished!' . '<br />';
		}
		function Button_VolumeDown( $television )
		{
			echo 'Tapping screen beginning...' . '<br />';
			
			if ( $television->curVolume > 0 )
			{
				$television->curVolume --;
				echo 'Lowering volume to ' . $television->curVolume . '<br />';
			}
			else
			{
				echo 'Volume is already as low as it can go!' . '<br />';
			}
			
			echo 'Tapping screen finished!' . '<br />';
		}
	}
	
// run
	// instantiate client for easy testing
	$client = new Client();
	
	// instantiate implementations
	$remote = new RemoteControl();
	$touchScreen = new TouchScreen();
	
	// instantiate combinations of implementors and implementations
	$junkyTelevision = new CrtTelevision( $remote );
	$newTelevision = new PlasmaTelevision( $remote );
	$frankensteinTelevision = new CrtTelevision( $touchScreen );
	$smartTv = new PlasmaTelevision( $touchScreen );
	
	$client->TestTelevision('Junky TV', $junkyTelevision);
	$client->TestTelevision('New TV', $newTelevision);
	$client->TestTelevision('Frankenstein TV', $frankensteinTelevision);
	$client->TestTelevision('Smart TV', $smartTv);
	
?>
.