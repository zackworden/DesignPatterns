<?php
// classes
	
	// implementor classes
	abstract class AbstractDocument
	{
		public $implementation;
		
		public $header;
		
		function __construct( $theHeader, $implementation )
		{
			$this->header = $theHeader;
			$this->implementation = $implementation;
		}
		function ShowHeader()
		{
			$this->implementation->Display( $this->header );
		}
	}
	class OfficialDocument extends AbstractDocument
	{
		public $implementation;
		
		public $header;
		
		function __construct( $theHeader, $implementation )
		{
			$this->header = 'OFFICIAL: ' . $theHeader;
			$this->implementation = $implementation;
		}
	}
	class Receipt extends AbstractDocument
	{
		public $implementation;
		
		public $header;
		
		function __construct( $theHeader, $implementation )
		{
			$this->header = 'Your receipt: ' . $theHeader;
			$this->implementation = $implementation;
		}
	}
	
	// implementation classes
	abstract class AbstractHeader
	{
		function Display( $headerText )
		{
		}
	}
	class MajorHeader extends AbstractHeader
	{
		function Display( $headerText )
		{
			echo '<h1>';
			echo $headerText;
			echo '</h1>';
		}
	}
	class MinorHeader extends AbstractHeader
	{
		function Display( $headerText )
		{
			echo '<h3>';
			echo $headerText;
			echo '</h3>';
		}
	}
	
// run
	// instantiate the two types of implementations
	$minorHeader = new MinorHeader();
	$majorHeader = new MajorHeader();
	
	// instantiate the different class and implementation combinations
	$digitalOceanReceipt = new Receipt('TooManyDomains.com', $majorHeader);
	$starbucksReceipt = new Receipt('Iced Coffee', $minorHeader);
	$constitution = new OfficialDocument('I really should know the opening line...', $majorHeader);
	$declaration = new OfficialDocument('We the people...', $majorHeader);
	$driversLicense = new OfficialDocument('D/O/B', $minorHeader);
	
	// call the ShowHeader method for each object
	$digitalOceanReceipt->ShowHeader();
	$starbucksReceipt->ShowHeader();
	$constitution->ShowHeader();
	$declaration->ShowHeader();
	$driversLicense->ShowHeader();
	
?>
.