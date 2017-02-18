<?php

use PHPUnit\Framework\TestCase;
use Yakovmeister\ScrapeQL\Struct;

class StructTest extends TestCase
{

	protected $instance;

	protected $haystack;

	public function setUp()
	{
		$this->instance = new Struct;

        $this->haystack = file_get_contents("http://steamcommunity.com/market/listings/570/Fervent%20Conscript%20Style%20Unlock");		
	}
	
	public function testPatternConstruction()
	{
		$this->instance
			 ->where("tag","a")
			 ->where("attribute","href","http://kissanime.ru/Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen");
			 		   
		var_dump($this->instance->constructPattern());
	}



	public function testResults()
	{
		$r = $this->instance
		     ->select()
		     ->source($this->haystack)
			 ->where("tag","a")
             ->where("attribute", "onclick", "Fervent Conscript")
			 ->fetch();

		var_dump($r);
	}

}