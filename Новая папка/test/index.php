<?php
class MySuite extends PHPUnit_Framework_testSuite
{
	public static function suite()
	{
		$suite = new MySuite('MyTestSuite');
		$suite->addTestSuite('MathClassTest');
		$suite->addTestSuite('MathClassTest0');
		$suite->addTestSuite('MathClassTest3');
		return $suite;
	}
}



class MathClass
{
	public function factorial($n)
	{
		if ($n == 0)
		{
			return 1;
		}
		else
		{
			return $n * $this->factorial($n-1);
		}
	}
}



	
class MathClassTest0 extends PHPUnit_Framework_TestCase
{
	public function testFactorial()
	{
		$my = new MathClass();
		$this->assertEquals(6, $my->factorial(3));
	}
}



class MathClassTest extends PHPUnit_Framework_TestCase
{
	/**
	*@dataProvider providerFactorial
	*/

	public function testFactorial($a,$b)
	{
		$my = new MathClass();
		$this->assertEquals($b, $my->factorial($a));
	}
	
	public function providerFactorial()
	{
		return array(
			array(0,1),
			array(2,2),
			array(3,16),
			array(5,120)
		);
	}
}


class MathClassTest3 extends PHPUnit_Framework_TestCase
{
	protected $fixture;
	
	protected function setUp()
	{
		$this->fixture = new MathClass();
	}
	
	protected function tearDown()
	{
		$this->fixture = NULL;
	}
	
	/**
	*@dataProvider providerFactorial
	*/
	
	public function testFactorial($a,$b)
	{
		$this->assertEquals($b, $this->fixture->factorial($a));
	}
	
	public function providerFactorial()
	{
		return array(
			array(0,1),
			array(2,2),
			array(3,16),
			array(5,120)
		);
	}	
	
}



?>






