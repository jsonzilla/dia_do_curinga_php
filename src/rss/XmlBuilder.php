<?php

namespace rss;

require_once __DIR__ . "/../ddc/Frode.php";

use ddc\Frode;

class XmlBuilder {  
  
  public function build($year, $month, $day, $actual_link) {
    $frode = new Frode();
    $s_date = strtotime($year.'-'.$month.'-'.$day);
    $rss = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
    $rss->addAttribute('version', '2.0');
    $canal = $rss->addChild('channel');
    $canal->addChild('title','Calendário do Curinga');
    $canal->addChild('link', $actual_link . '/rss.php');
    $canal->addChild('description', 'Hoje no calendário de Frode');
      $item = $canal->addChild('item');
        $item->addChild('title', $frode->LongVersion($day,$month,$year) .'-'. $frode->ShortVersion($day,$month,$year));
        $item->addChild('link', $actual_link . '/rss.php');
        $item->addChild('description', $frode->LongVersion($day,$month,$year) .'-'. $frode->ShortVersion($day,$month,$year));
        $item->addChild('guid', $actual_link . '/rss.php/' . date('YMd', $s_date));
        $item->addChild('pubDate', date('r', $s_date));
    
    return $rss->asXML();
  }
}

?>