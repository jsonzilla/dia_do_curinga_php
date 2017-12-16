<?php

namespace ddc;

class Date {

  public function validDate($day, $month, $year) {
    if ($day < 1 || $day > 31 || $year == 0 || $month < 1 || $month > 12) {
      return false;
    }
    else if (($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) && $day <= 31) {
      return true;
    }
    else if (($month == 4 || $month == 6 || $month == 9 || $month == 11) && $day <= 30) {
      return true;
    }
    else if ($month == 2) {
      return $this->feb($day, $year);
    }
  
    return false;
  }

  public function isLeapYear($year) {
    return ($year % 400 == 0) || ($year % 4 == 0 && $year%100 != 0);
  }

  public function isLeapYearInt($year) {
    if ($this->isLeapYear($year)) {
      return 1;
    }
    return 0;
  }

  public function feb ($day, $year) {
    return $day <= (28 + $this->isLeapYearInt($year));
  }

  public function countDays($day, $month, $year) {
    $leap = $this->isLeapYearInt($year);
    switch ($month) {
    case 1:
      return $day;
    case 2:
      return $day + 31;
    case 3:
      return $day + 59 + $leap;
    case 4:
      return $day + 90 + $leap;
    case 5:
      return $day + 120 + $leap;
    case 6:
      return $day + 151 + $leap;
    case 7:
      return $day + 181 + $leap;
    case 8:
      return $day + 212 + $leap;
    case 9:
      return $day + 243 + $leap;
    case 10:
      return $day + 273 + $leap;
    case 11:
      return $day + 304 + $leap;
    case 12:
      return $day + 334 + $leap;
    }
    return 0;
  }

}


?>