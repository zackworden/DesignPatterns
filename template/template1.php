<?php
// const
	
// var
	
// class
	class Client
	{
		
	}
	
	abstract class AbstractArtwork
	{
		public $title;
		
		function __construct( $t )
		{
			$this->title = $t;
		}
		function CreateArt()
		{
			echo '<div style="padding:1em 0;">';
			echo '<div style="font-weight:bold;">' . $this->title . '</div>';
			$this->DrawLines();
			$this->PaintColors();
			$this->Cleanup();
			echo '</div>';
		}
		function DrawLines()
		{
			echo 'Drawing lines and outlines';
			echo '<br />';
		}
		function PaintColors()
		{
			echo 'Filling with color';
			echo '<br />';
		}
		function Cleanup()
		{
			echo 'Laminating';
			echo '<br />';
		}
	}
	class Sculpture extends AbstractArtwork
	{
		function DrawLines()
		{
			echo 'Chiselling shape into stone.';
			echo '<br />';
		}
		function PaintColors()
		{
			echo 'Painting surface of stonework.';
			echo '<br />';
		}
		function Cleanup()
		{
			echo 'Vacuuming up stone dust.';
			echo '<br />';
		}
	}
	class Painting extends AbstractArtwork
	{
		function Cleanup()
		{
			echo 'Stretching canvas';
			echo '<br />';
		}
	}
	class Sketch extends AbstractArtwork
	{
		function PaintColors()
		{
			echo 'Shading with pencil...';
			echo '<br />';
		}
		function Cleanup()
		{
			echo 'Hanging on wall';
			echo '<br />';
		}
	}
	class BadArt extends AbstractArtwork
	{
		function DrawLines()
		{
			parent::DrawLines();
			echo 'Tracing over the lines so people know you mean it.';
			echo '<br />';
		}
		function Cleanup()
		{
			parent::Cleanup();
			echo 'Posting artwork on Instagram.';
			echo '<br />';
		}
	}
// function
	
// run
	// create a Sculpture object
	$michaelangelo = new Sculpture('Famous Sculpture');
	
	// call CreateArt on Sculpture object
	$michaelangelo->CreateArt();
	
	// create a Painting object and call CreateArt
	$vanGogh = new Painting('Important Painting');
	$vanGogh->CreateArt();
	
	// create a Sketch object and call CreateArt
	$someFlunky = new Sketch('What you did during the Agile meeting today');
	$someFlunky->CreateArt();
	
	// create a BadArt object and call CreateArt, so we can see some parent::method overrides
	$pollockWannabee = new BadArt('Self-important artwork');
	$pollockWannabee->CreateArt();
?>
.