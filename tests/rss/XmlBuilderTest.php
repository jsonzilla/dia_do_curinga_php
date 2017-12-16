<?php

namespace rss;

use PHPUnit_Framework_TestCase as PHPUnit;

class XmlBuilderTest extends PHPUnit {

  public function test_build() {
    $builder = new XmlBuilder();

    $rss = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
    $rss->addAttribute('version', '2.0');
    $canal = $rss->addChild('channel');
    $canal->addChild('title','Calendário do Curinga');
    $canal->addChild('link', 'http://localhost/rss.php');
    $canal->addChild('description', 'Hoje no calendário de Frode');
      $item = $canal->addChild('item');
        $item->addChild('title', 'Dia valete de copas, semana dez de copas, mês nove estação de paus, ano sete de paus, 1/11/2017 dia 245-JC10C9P7P');
        $item->addChild('link', 'http://localhost/rss.php');
        $item->addChild('description', 'Dia valete de copas, semana dez de copas, mês nove estação de paus, ano sete de paus, 1/11/2017 dia 245-JC10C9P7P');
        $item->addChild('guid', 'http://localhost/rss.php/2017Nov01');
        $item->addChild('pubDate', 'Wed, 01 Nov 2017 00:00:00 +0000');

    $actual_link = "http://localhost"; 
		$this->assertEquals($rss->asXML(), ($builder->build(2017, 11, 1, $actual_link)));
	}	
}

?>