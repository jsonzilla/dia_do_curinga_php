<?php

namespace ddc;

require 'ddc/Date.php';

class Frode {
  function cardMonth($day) {
    return ($day / 28) % 13;
  }
  
  function suitWeek($day) {
    return (($day / 7) / 13) % 4;
  }
  
  function cardWeek($day) {
    return ($day / 7) % 13;
  }
  
  function suitDay($day) {
    if ($day == 0) {
      return 4;
    }
    return (($day - 1) / 13) % 4;
  }
  
  function cardDay($day) {
    if ($day == 0) {
      return 13;
    }
    return ($day - 1) % 13;
  }

  function suitYear($year) {
    return ($this->fixYear($year) / 13) % 4;
  }
  
  function cardYear($year) {
    return $this->fixYear($year) % 13;
  }

  public function fixYear($year) {
    if ($year < 1790) {
      return 1790 - $year;
    }
    return $year - 1790;
  }

  public function fixDay($year, $day) {
    $date = new Date();
    $leap = $date->isLeapYearInt($year);
    if ($day > 60-$leap) {
      return $day - 60;
    }
    return $day + 305;
  }

  public function seasons($day, $year) {
    $date = new Date();
    $leap = $date->isLeapYearInt($year);
    if ($day <= (62 - $leap)) {
      return 1;
    }
    else if ($day <= (154 - $leap)) {
      return 2;
    }
    else if ($day <= (247 - $leap)) {
      return 3;
    }
    else if ($day <= (338 - $leap)) {
      return 0;
    }
    else if ($day <= (367 - $leap)) {
      return 1;
    }
    return 1;
  }

  public function shortVersion($day, $month, $year) {
    $date = new Date();
    if (!$date->validDate($day, $month, $year)) {
      return "";
    }
  
    $cards = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "Jo", "Jd");
    $suits = array("O", "P", "C", "E", "");

    $days = $this->fixDay($year, $date->countDays($day, $month, $year));

    $output = $cards[$this->cardDay($days)] . $suits[$this->suitDay($days)] . 
      $cards[$this->cardWeek($days)] . $suits[$this->suitWeek($days)] .
      $cards[$this->cardMonth($days)] . $suits[$this->seasons($day, $year)] .
      $cards[$this->cardYear($year)] . $suits[$this->suitYear($year)];
    
    return $output;
  }

  public function LongVersion($day, $month, $year) {
    $date = new Date();
    if (!$date->validDate($day, $month, $year)) {
      return "";
    }
  
    $cards = array("As", "dois", "três", "quatro", "cinco",
      "seis", "sete", "oito", "nove", "dez",
      "valete", "dama", "rei", "do curinga");
    $suits = array(" de ouros", " de paus", " de copas", " de espadas");
  
    $days = $this->fixDay($year, $date->countDays($day, $month, $year));

    $output = "Dia " . $cards[$this->cardDay($days)] . $suits[$this->suitDay($days)] . 
      ", semana " . $cards[$this->cardWeek($days)] . $suits[$this->suitWeek($days)] .
      ", mês " .  $cards[$this->cardMonth($days)] . " estação" . $suits[$this->seasons($day, $year)] .
      ", ano " .  $cards[$this->cardYear($year)] . $suits[$this->suitYear($year)] .
      ", " . $day . "/"  . $month . "/" . $year . " dia " . $days;
  
    return $output;
  }
}
?>