<?php
require_once "vendor/autoload.php";

$html = Sunra\PhpSimple\HtmlDomParser::file_get_html('http://pokemondb.net/evolution');

foreach($html->find('a[class=ent-name]') as $element){
	echo $element->innertext . PHP_EOL; //outputs bulbasaur, ivysaur, etc...
} 