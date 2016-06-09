<?php
// const
	
// var
	
// class
	class Client
	{
		function UseIterator( $iterator )
		{
			echo '<table border="1">';
			echo '<th>Title</th>';
			echo '<th>Genre</th>';
			echo '<th>Year</th>';
			
			for( $iterator->First(); $iterator->IsDone() !== true; $iterator->Next() )
			{
				$currentMovie = $iterator->Current();
				echo '<tr>';
				echo '<td>';
				echo $currentMovie->title;
				echo '</td>';
				echo '<td>';
				echo $currentMovie->genre;
				echo '</td>';
				echo '<td>';
				echo $currentMovie->releaseYear;
				echo '</td>';
				echo '</tr>';
			}
			
			echo '</table>';
		}
	}
	
	// list
	class Movie
	{
		public $title;
		public $releaseYear;
		public $genre;
		
		function __construct( $t, $y, $g )
		{
			$this->title = $t;
			$this->releaseYear = $y;
			$this->genre = $g;
		}
	}
	class MovieListing
	{
		public $movieList = [];
		
		function __construct( $arrayOfMovies )
		{
			$this->movieList = $arrayOfMovies;
		}
		function GetItem( $index )
		{
			return $this->movieList[$index];
		}
		function GetCount()
		{
			return count( $this->movieList );
		}
		function GetIterator_Forwards()
		{
			return new ForwardIterator($this);
		}
		function GetIterator_Backwards()
		{
			return new BackwardIterator($this);
		}
	}
	
	// iterators
	abstract class AbstractIterator
	{
		function First(){}
		function Next(){}
		function Current(){}
		function IsDone(){}
	}
	class ForwardIterator extends AbstractIterator
	{
		public $movieListing;
		public $current;
		
		function __construct( $listing )
		{
			$this->movieListing = $listing;
		}
		function First()
		{
			$this->current = 0;
		}
		function Next()
		{
			$this->current ++;
		}
		function Current()
		{
			if ( $this->IsDone() == true)
			{
				throw new Exception('Iterator out of bounds!');
			}
			else
			{
				return $this->movieListing->GetItem($this->current);
			}
		}
		function IsDone()
		{
			if ( $this->current > $this->movieListing->GetCount() )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	class BackwardIterator extends AbstractIterator
	{
		public $movieListing;
		public $current;
		
		function __construct( $listing )
		{
			$this->movieListing = $listing;
		}
		function First()
		{
			$this->current = $this->movieListing->GetCount();
		}
		function Next()
		{
			$this->current --;
		}
		function Current()
		{
			if ( $this->IsDone() == true)
			{
				throw new Exception('Iterator out of bounds!');
			}
			else
			{
				return $this->movieListing->GetItem($this->current);
			}
		}
		function IsDone()
		{
			if ( $this->current < 0 )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
// function
	
// run
	// create client, which cleans up testing
	$client = new Client();
	
	// create movies
	$movie1 = new Movie('Braveheart',1994,'Drama');
	$movie2 = new Movie('Seven Samurai',1955,'Historical Fiction');
	$movie3 = new Movie('Terminator',1984,'Action');
	$movie4 = new Movie('Pulp Fiction',1992,'Cult Classic');
	
	// create a list from the movie objects
	$movieList = new MovieListing([$movie1,$movie2,$movie3,$movie4]);
	
	// get the iterator from the list
	$iter = $movieList->GetIterator_Forwards();
	
	// iterate across list
	$client->UseIterator($iter);
	
	// now get another iterator
	$iter2 = $movieList->GetIterator_Backwards();
	
	// and iterate across this list
	$client->UseIterator($iter2);
	
?>
.