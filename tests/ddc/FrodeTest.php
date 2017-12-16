<?php

namespace ddc;

require_once __DIR__ . "../../../src/ddc/Frode.php";

use PHPUnit_Framework_TestCase as PHPUnit;

class FrodeTest extends PHPUnit {

  public function test_fixDay() {
		$frode = new Frode();
		$this->assertEquals(140, ($frode->fixDay(2011, 200)));
		$this->assertEquals(364, ($frode->fixDay(2011, 59)));
		$this->assertEquals(1, ($frode->fixDay(2011, 61)));
		$this->assertEquals(364, ($frode->fixDay(2011, 59)));
		$this->assertEquals(365, ($frode->fixDay(2011, 60)));
	}

  public function test_fixYeary() {
		$frode = new Frode();
		$this->assertEquals(1, ($frode->fixYear(1789)));
		$this->assertEquals(0, ($frode->fixYear(1790)));
		$this->assertEquals(1, ($frode->fixYear(1791)));
	}


	public function test_seasons() {
		$frode = new Frode();
		$this->assertEquals(1, ($frode->seasons(62, 1790)));
		$this->assertEquals(2, ($frode->seasons(154, 1790)));
		$this->assertEquals(3, ($frode->seasons(247, 1790)));
		$this->assertEquals(0, ($frode->seasons(338, 1790)));
		$this->assertEquals(1, ($frode->seasons(365, 1790)));
	}


	public function test_shortVersion() {
		$frode = new Frode();
		$this->assertEquals("KE1O1P1P", ($frode->shortVersion(28, 2, 2011)));
		$this->assertEquals("1O1O1P1P", ($frode->shortVersion(1, 3, 2011)));
		$this->assertEquals("QEKEKP2P", ($frode->shortVersion(27, 2, 2012)));
		$this->assertEquals("KE1O1P2P", ($frode->shortVersion(28, 2, 2012)));
		$this->assertEquals("Jo1O1P2P", ($frode->shortVersion(29, 2, 2012)));
		$this->assertEquals("1O1O1P2P", ($frode->shortVersion(1, 3, 2012)));
		$this->assertEquals("KE1O1P3P", ($frode->shortVersion(28, 2, 2013)));
		$this->assertEquals("1O1O1P3P", ($frode->shortVersion(1, 3, 2013)));
		$this->assertEquals("KE1O1P4P", ($frode->shortVersion(28, 2, 2014)));
		$this->assertEquals("1O1O1P4P", ($frode->shortVersion(1, 3, 2014)));
		$this->assertEquals("10C8P6P7P", ($frode->shortVersion(19, 7, 2017)));
		$this->assertEquals("", ($frode->shortVersion(28, 20, 2011)));
	}

	public function test_longVersion() {
		$frode = new Frode();
		$this->assertEquals('Dia dez de copas, semana oito de paus, mês seis estação de paus, ano sete de paus, 19/7/2017 dia 140', ($frode->longVersion(19, 7, 2017)));
		$this->assertEquals("", ($frode->longVersion(19, 70, 2017)));
	}
}
?> 
