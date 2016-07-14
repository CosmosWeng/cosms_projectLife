<?php
$local = strtr(dirname(dirname(__FILE__)), array('\\'=>'/','\/'=>'/'));
$url = substr($local,0,strpos($local,'/js'));
var_dump($url);