<?php
require_once "vendor/autoload.php";

$tweet_results = [];

$html = Sunra\PhpSimple\HtmlDomParser::file_get_html('http://twitter.com/alexroan');

foreach($html->find('div[class=tweet]') as $tweet){
	$tweet_result = new stdClass();

	$property = 'data-item-id';
	$tweet_result->id = $tweet->$property;
	
	$tweet_is_retweet = false;
	foreach($tweet->find('div[class=context]') as $tweet_context){
		if( strlen($tweet_context->innertext) > 19 ){
			if (sizeof($tweet_context->find('span[class=Icon--retweeted]')) > 0){
				$tweet_is_retweet = true;
			}
		}
	}
	$tweet_result->is_retweet = $tweet_is_retweet;

	array_push($tweet_results, $tweet_result);
} 

echo json_encode($tweet_results);

