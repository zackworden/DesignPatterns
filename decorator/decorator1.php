<?php
// const
	
// var
	
// class
	class Client
	{
		
	}
	
	// components
	abstract class Component
	{
		function Display()
		{
		}
	}
	class HtmlWindow extends Component
	{
		private $x;
		private $y;
		private $width;
		private $height;
		private $innerText;
		
		function __construct( $x, $y, $width, $height, $innerText )
		{
			$this->x = $x;
			$this->y = $y;
			$this->width = $width;
			$this->height = $height;
			$this->innerText = $innerText;
		}
		function Display()
		{
echo <<<HTML
<div style="left:$this->x; top:$this->y; width:$this->width; height:$this->height; background-color:#EEEEEE; text-align:center;">
$this->innerText
</div>
HTML;
		}
	}
	
	// decorators
	abstract class Decorator extends Component
	{
		public $element;
		
		function __construct( Component $window )
		{
			$this->element = $window;
		}
		function Display()
		{
			$this->element->Display();
		}
	}
	class BorderDecorator extends Decorator
	{
		public $element;
		
		function __construct( Component $window )
		{
			$this->element = $window;
		}
		function Display()
		{
			echo '<div style="border:2px solid #333; width:auto; height:auto; display:inline-block;">';
			$this->element->Display();
			echo '</div>';
		}
	}
	class TextDecorator extends Decorator
	{
		public $element;
		
		function __construct( Component $window )
		{
			$this->element = $window;
		}
		function Display()
		{
			echo '<div style="color:#333333; font-size:1.5em; font-family:Arial, Helvetica, sans-serif;">';
			$this->element->Display();
			echo '</div>';
		}
	}
// function
	
// run
	// create the html window object
	$window = new HtmlWindow(450,300,300,100,'My window appears here!');
	
	// create a BorderDecorator object
	$borderDecorator = new BorderDecorator( $window );
	
	// create a TextDecorator object
	$textDecorator = new TextDecorator( $borderDecorator );
	
	// now display the text decorator, border decorator, and html window
	$textDecorator->Display();
	
?>
.