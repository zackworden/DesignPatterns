<?php
// class
	// book and list classes
	class Book
	{
		public $title;
		public $author;
		
		function __construct( $t, $a )
		{
			$this->title = $t;
			$this->author = $a;
		}
	}
	class BookList
	{
		public $books = [];
		public $bookCount = 0;
		
		function __construct( $array )
		{
			$this->books = $array;
			$this->bookCount = count($this->books);
		}
		function GetBook( $index )
		{
			return $this->books[$index];
		}
		function GetCount()
		{
			return count($this->books);
		}
		function GetIterator()
		{
			return new BookIterator( $this );
		}
		function GetReverseIterator()
		{
			return new ReverseBookIterator( $this );
		}
	}
	
	// iterators
	interface Iteration
	{
		function First();
		function Next();
		function IsDone();
		function CurrentItem();
	}
	class BookIterator implements Iteration
	{
		public $bookList;
		public $currentBook = 0;
		
		function __construct( BookList $bookList )
		{
			$this->bookList = $bookList;
		}
		function First()
		{
			$this->currentBook = 0;
		}
		function Next()
		{
			$this->currentBook ++;
		}
		function IsDone()
		{
			if ( $this->currentBook >= $this->bookList->GetCount() )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function CurrentItem()
		{
			if ( $this->IsDone() )
			{
				return null;
			}
			else
			{
				return $this->bookList->GetBook( $this->currentBook );
			}
		}
	}
	class ReverseBookIterator implements Iteration
	{
		public $bookList;
		public $currentBook = 0;
		
		function __construct( BookList $bookList )
		{
			$this->bookList = $bookList;
		}
		function First()
		{
			$this->currentBook = $this->bookList->GetCount() - 1;
		}
		function Next()
		{
			$this->currentBook --;
		}
		function IsDone()
		{
			if ( $this->currentBook < 0 )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function CurrentItem()
		{
			if ( $this->IsDone() )
			{
				return null;
			}
			else
			{
				return $this->bookList->GetBook( $this->currentBook );
			}
		}
	}
// run
	// create some books
	$book1 = new Book('Manual','unknown');
	$book2 = new Book('Moby Dick','Herman Melville');
	$book3 = new Book('Harry Potter','JK Rowling');
	$book4 = new Book('Jurassic Park','Michael Crichton');
	
	// create a list of books
	$list = new BookList([$book1, $book2, $book3, $book4 ]);
	
	// create the iterator
	$iterator = $list->GetIterator();
	
	// using iterator interface, loop through all books
	echo '<h3>ITERATOR</h3>';
	for ( $iterator->First(); $iterator->IsDone() == false; $iterator->Next() )
	{
		$item = $iterator->CurrentItem();
		echo $item->title . ', by ' . $item->author;
		echo '<br /><br />';
	}
	
	// now create a reverse iterator
	$evilIterator = $list->GetReverseIterator();
	
	// using the same interface, loop through all books in reverse order
	echo '<h3>REVERSE ITERATOR</h3>';
	for ( $evilIterator->First(); $evilIterator->IsDone() == false; $evilIterator->Next() )
	{
		$item = $evilIterator->CurrentItem();
		echo $item->title . ', by ' . $item->author;
		echo '<br /><br />';
	}
?>
.