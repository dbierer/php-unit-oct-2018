<?php
namespace Application\FizzBuzz;

class FizzBuzz
{
	public function process($x)
	{
		switch (true) {
			case (($x % 3) == 0) :
				$val = 'Fizz';
				break;
			case (($x % 5) == 0) :
				$val = 'Buzz';
				break;
			default :
				$val = $x;
			// etc.
		}		
		return $val;
	}
}
