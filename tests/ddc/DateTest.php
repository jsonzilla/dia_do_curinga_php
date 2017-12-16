<?php

namespace ddc;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

class DateTest extends PHPUnit {

  public function test_validDate() {
			$date = new Date();
			$this->assertEquals(true, ($date->validDate(10, 1, 1999)));
			$this->assertEquals(false, ($date->validDate(0, 1, 1999)));
			$this->assertEquals(false, ($date->validDate(32, 1, 1999)));
			$this->assertEquals(true, ($date->validDate(29, 2, 2012)));
			$this->assertEquals(false, ($date->validDate(29, 2, 2011)));
			$this->assertEquals(false, ($date->validDate(1, 0, 1999)));
			$this->assertEquals(false, ($date->validDate(1, 13, 1999)));
			$this->assertEquals(false, ($date->validDate(1, 12, 0)));
			$this->assertEquals(true, ($date->validDate(1, 12, 1789)));
			$this->assertEquals(true, ($date->validDate(1, 12, 1790)));
      $this->assertEquals(true, ($date->validDate(1, 12, 9999)));
      $this->assertEquals(true, ($date->validDate(1, 4, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 5, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 6, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 7, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 8, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 9, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 10, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 11, 1990)));
      $this->assertEquals(true, ($date->validDate(1, 12, 1990)));
	}
	
	public function test_isLeapYearInt() {
			$date = new Date();
			$this->assertEquals(true, ($date->isLeapYearInt(2012, 1)));
			$this->assertEquals(false, ($date->isLeapYearInt(2011, 0)));
	}
	
	public function test_isLeapYear() {
		$date = new Date();
		$this->assertEquals(true, ($date->isLeapYear(2012, 1)));
		$this->assertEquals(false, ($date->isLeapYear(2011, 0)));
  }

  public function test_feb() {
		$date = new Date();
    $this->assertEquals(false, ($date->feb(30,2012)));
    $this->assertEquals(false, ($date->feb(29,2011)));
    $this->assertEquals(true, ($date->feb(29,2012)));
    $this->assertEquals(true, ($date->feb(28,2013)));
    $this->assertEquals(false, ($date->feb(30,2011)));
  }

  public function test_countDays() {
		$date = new Date();
    $this->assertEquals(200, ($date->countDays(19,7,2017)));
    $this->assertEquals(365, ($date->countDays(31,12,2017)));
    $this->assertEquals(1, ($date->countDays(1,1,2017)));
    $this->assertEquals(365, ($date->countDays(31,12,2007)));
    $this->assertEquals(366, ($date->countDays(31,12,2012)));
    $this->assertEquals(91, ($date->countDays(1, 4, 1990)));
    $this->assertEquals(121, ($date->countDays(1, 5, 1990)));
    $this->assertEquals(152, ($date->countDays(1, 6, 1990)));
    $this->assertEquals(182, ($date->countDays(1, 7, 1990)));
    $this->assertEquals(213, ($date->countDays(1, 8, 1990)));
    $this->assertEquals(244, ($date->countDays(1, 9, 1990)));
    $this->assertEquals(274, ($date->countDays(1, 10, 1990)));
    $this->assertEquals(305, ($date->countDays(1, 11, 1990)));
    $this->assertEquals(335, ($date->countDays(1, 12, 1990)));
  }
}
?> 