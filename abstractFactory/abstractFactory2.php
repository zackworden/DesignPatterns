<?php
// const
	
// var
	
// class
	class Client
	{
		function Print_DogStats( Dog $d )
		{
echo <<<dog
<p>
Name: $d->name <br />
Breed: $d->breed <br />
Size: $d->size <br />
</p>
dog;
		}
	}
	
	abstract class AbstractDogFactory
	{
		function GetDog()
		{
			return new Dog('A generic dog','A generic size','A mongrel');
		}
	}
	class DalmatianFactory extends AbstractDogFactory
	{
		function GetDog()
		{
			return new Dog('Dasher','medium','Dalmatian');
		}
	}
	class CockerSpanielFactory extends AbstractDogFactory
	{
		function GetDog()
		{
			return new Dog('Shithead','smallish','Cocker Spaniel');
		}
	}
	class AustrailianShepherdFactory extends AbstractDogFactory
	{
		function GetDog()
		{
			return new Dog('Hannibal Barker','medium','Austrailian Shepherd');
		}
	}
	class RidgebackFactory extends AbstractDogFactory
	{
		function GetDog()
		{
			return new Dog('Moose','large','Ridgeback');
		}
	}
	
	class Dog
	{
		public $name;
		public $size;
		public $breed;
		
		function __construct( $name, $size, $breed )
		{
			$this->name = $name;
			$this->size = $size;
			$this->breed = $breed;
		}
	}
// function
	
// run
	$spanielFactory = new CockerSpanielFactory();
	$cs = $spanielFactory->GetDog();
	
	$ridgeFactory = new RidgebackFactory();
	$rb = $ridgeFactory->GetDog();
	
	$shepFactory = new AustrailianShepherdFactory();
	$shep = $shepFactory->GetDog();
	
	$client = new Client();
	$client->Print_DogStats($cs);
	$client->Print_DogStats($rb);
	$client->Print_DogStats($shep);
?>
.