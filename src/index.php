<?php

require 'rss/XmlBuilder.php';
use rss\XmlBuilder;

$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$builder = new XmlBuilder();
$rss = $builder->build(date("Y"),date("n"),date("j"),$uri);
echo $rss;

?>