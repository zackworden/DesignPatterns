<?php
// class
	
	// context
	abstract class Composition
	{
		public $title;
		public $summary;
		public $compositor;
		
		function __construct( $t, $s, $c )
		{
			$this->title = $t;
			$this->summary = $s;
			$this->compositor = $c;
		}
		function Compose()
		{
			$this->compositor->Compose( $this->title, $this->summary );
		}
	}
	class Article extends Composition
	{
		
	}
	
	// strategy
	abstract class AbstractStrategy
	{
		function Compose( $t, $s )
		{
			
		}
	}
	class FeaturedArticle extends AbstractStrategy
	{
		function Compose( $t, $s )
		{
echo <<<HTML
<div style="margin:1em 0; padding:1em 0; border:3px solid #CCCCCC;">
	<h2 style="padding:0 0 .7em 0; margin:0;">
		$t
	</h2>
	<div style="font-style:italics;">
		$s
	</div>
</div>
HTML;
		}
	}
	class TiledArticle extends AbstractStrategy
	{
		function Compose( $t, $s )
		{
echo <<<HTML
<div style="margin:1em 0; padding:2em 1em; border:1px solid #EEE; display:inline-block; max-width:20em; font-family:Arial, Helvetica, sans-serif; border-radius:6px;">
	<h2 style="font-size:1.2em;">
		$t
	</h2>
	<div style="font-style:italics; font-size:.9em;">
		$s
	</div>
</div>
HTML;
		}
	}
	class ListedArticle extends AbstractStrategy
	{
		function Compose( $t, $s )
		{
echo <<<HTML
<div style="margin:1em 0; padding:1em 0; display:block;">
	&bull; <b>$t</b>: <span style="font-style:italics;">$s</span>
</div>
HTML;
		}
	}
	
// run
	// create three different strategies for handling articles
	$featured = new FeaturedArticle();
	$tiled = new TiledArticle();
	$listed = new ListedArticle();
	
	// create an Article object, and use the FeaturedArticle strategy
	$article1 = new Article('Frog Eats Man','People were shocked today when a 3" western pond frog devoured most of a man as onlookers watched in horror.', $featured);
	
	// now call Compose on the Article object
	$article1->Compose();
	
	// Repeat for the same article with a different strategy
	$article1 = new Article('Frog Eats Man','People were shocked today when a 3" western pond frog devoured most of a man as onlookers watched in horror.', $tiled);
	$article1->Compose();
	
	// Repeat again. Same article, last strategy
	$article1 = new Article('Frog Eats Man','People were shocked today when a 3" western pond frog devoured most of a man as onlookers watched in horror.', $listed);
	$article1->Compose();
	
?>
.