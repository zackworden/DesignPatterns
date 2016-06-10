<?php
// class
	
	// component
	abstract class Component
	{
		function MakeHeadline()
		{
		}
	}
	
	// concrete element
	class Headline extends Component
	{
		private $text;
		
		function __construct( $t )
		{
			$this->text = $t;
		}
		function MakeHeadline()
		{
			echo $this->text;
		}
	}
	
	// decorators
	class FancyFontDecorator extends Component
	{
		public $element;
		
		function __construct( $e )
		{
			$this->element = $e;
		}
		function MakeHeadline()
		{
			echo '<div style="font-family:Arvo;">';
			$this->element->MakeHeadline();
			echo '</div>';
		}
	}
	class FontSizeDecorator extends Component
	{
		public $element;
		public $size;
		
		function __construct( $e, $s )
		{
			$this->element = $e;
			$this->size = $s;
		}
		function MakeHeadline()
		{
			echo '<div style="font-size:' . $this->size . ';">';
			$this->element->MakeHeadline();
			echo '</div>';
		}
	}
	class FontFaceDecorator extends Component
	{
		public $element;
		public $fontFamily;
		
		function __construct( $e, $f )
		{
			$this->element = $e;
			$this->fontFamily = $f;
		}
		function MakeHeadline()
		{
			echo '<div style="font-family:' . $this->fontFamily . ';">';
			$this->element->MakeHeadline();
			echo '</div>';
		}
	}

// run
	// first, we're using a google font, so lets just place that anywhere.
	echo "<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>";
	
	// create the headline objects
	$movieTitle = new Headline('Death Fist 9000');
	$movieSubtitle = new Headline('No one spikes THIS punch!');
	
	// create a font size decorator for the headline
	$headFontSize = new FontSizeDecorator($movieTitle, '1.3em');
	
	// ... and for the subheadline
	$subheadFontSize = new FontSizeDecorator($movieSubtitle, '1.1em');
	
	// create a font face decorator for the headline
	$headFontFace = new FontFaceDecorator( $headFontSize, 'Arvo');
	
	// and display both
	$headFontFace->MakeHeadline();
	$subheadFontSize->MakeHeadline();
?>
.