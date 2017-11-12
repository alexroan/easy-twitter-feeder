<?php
require_once "vendor/autoload.php";

$tweet_results = [];


$html = Sunra\PhpSimple\HtmlDomParser::file_get_html('http://twitter.com/alexroan');

foreach($html->find('div[class=tweet]') as $tweet){
	$tweet_result = new stdClass();

	//tweet ID
	$property = 'data-item-id';
	$tweet_result->id = $tweet->$property;

	//username of tweet
	$property = 'data-screen-name';
	$tweet_result->username = $tweet->$property;

	//is a retweet?
	$tweet_is_retweet = false;
	foreach($tweet->find('div[class=context]') as $tweet_context){
		if( strlen($tweet_context->innertext) > 19 ){
			if (sizeof($tweet_context->find('span[class=Icon--retweeted]')) > 0){
				$tweet_is_retweet = true;
				break;
			}
		}
	}
	$tweet_result->is_retweet = $tweet_is_retweet;

	//tweet text
	//TODO
	$tweet_text = "";
	$tweet_images = [];
	foreach($tweet->find('div[class=js-tweet-text-container]') as $tweet_content){
		//echo $tweet_content->innertext;
		foreach($tweet_content->find('p[class=tweet-text]') as $tweet_content_text){
			$tweet_text = $tweet_content_text->innertext;
			break;
		}
		break;
	}
	$tweet_result->text = $tweet_text;

	//tweet time
	$time = null;
	$property = 'data-time';
	foreach($tweet->find('small[class=time]') as $tweet_time){
		foreach($tweet_time->find('span[class=_timestamp]') as $timestamp){
			$time = $timestamp->$property;
			break;
		}
		break;
	}
	$tweet_result->time = $time;

	//media

	//reply
	$retweets = null;
	$property = 'data-tweet-stat-count';
	foreach($tweet->find('div[class=ProfileTweet-action--reply]') as $reply_div){
		foreach($reply_div->find('span[class=ProfileTweet-actionCountForPresentation]') as $action_count){
			$replies = $action_count->innertext;
			break;
		}
		break;
	}
	$tweet_result->reply = $replies;

	//retweet
	$retweets = null;
	foreach($tweet->find('div[class=ProfileTweet-action--retweet]') as $reply_div){
		foreach($reply_div->find('span[class=ProfileTweet-actionCountForPresentation]') as $action_count){
			$retweets = $action_count->innertext;
			break;
		}
		break;
	}
	$tweet_result->retweet = $retweets;

	//favourite
	$favourites = null;
	foreach($tweet->find('div[class=ProfileTweet-action--favorite]') as $reply_div){
		foreach($reply_div->find('span[class=ProfileTweet-actionCountForPresentation]') as $action_count){
			$favourites = $action_count->innertext;
			break;
		}
		break;
	}
	$tweet_result->favourite = $favourites;

	array_push($tweet_results, $tweet_result);
} 

echo json_encode($tweet_results);

