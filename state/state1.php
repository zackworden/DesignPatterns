<?php
// class
	
	// context
	class Website
	{
		public $state;
		
		function Build()
		{
			$this->state->Build();
		}
		function SetState( AbstractPageState $s )
		{
			$this->state = $s;
		}
	}
	
	// state
	abstract class AbstractPageState
	{
		function Build()
		{
		}
	}
	class FirstPageState extends AbstractPageState
	{
		function Build()
		{
echo <<<HTML
<div style="margin:5em 0;">
<h2>Hello, mortals!</h2>
<p>Welcome to my website.</p>
<p>Please wait while Flash loads my amazing introduction!</p>
</div>
HTML;
		}
	}
	class SecondPageState extends AbstractPageState
	{
		function Build()
		{
echo <<<HTML
<div style="margin:5em 0;">
<h2>You made it!</h2>
<p>Thank you for staying around.</p>
<p>As a reward, you will be spared!</p>
</div>
HTML;
		}
	}
	class ThirdPageState extends AbstractPageState
	{
		function Build()
		{
echo <<<HTML
<div style="margin:5em 0;">
<h2>Still here?!</h2>
<p>Don't know when to leave, do you?</p>
</div>
HTML;
		}
	}

// run
	// first, we'll create objects for the different states this website could have
	$firstPage = new FirstPageState();
	$secondPage = new SecondPageState();
	$thirdPage = new ThirdPageState();
	
	// now we'll create a website to display the various page states
	$myWebsite = new Website();
	
	// ...and set its state to the first page
	$myWebsite->SetState($firstPage);
	
	// now display
	$myWebsite->Build();
	
	// set the websites state to the second page and build
	$myWebsite->SetState($secondPage);
	$myWebsite->Build();
	
	// and repeat again for the third state
	$myWebsite->SetState($thirdPage);
	$myWebsite->Build();
?>
.