# Easy Twitter Feeder
Wordpress plugin to get the twitter feed of any public twitter user without the need for twitter api credentials.

## Installation

* Copy the entire repo into your plugins/ folder
* Activate in wordpress dashboard

## Usage

```php
//get feed
$feed = get_twitter_feed('alexroan');

//loop through tweets
foreach($feed as $tweet){ 

  //tweet id
  $id = $tweet->id;
  
  //username of tweeter
  $username = $tweet->username;
  
  //bool whether retweet or not
  $is_retweet = $tweet->is_retweet;
  
  //body text of tweet
  $text = $tweet->text;
  
  //time tweeted
  $time = $tweet->time;
  
  //any media in tweet
  $media = $tweet->media;
  
  //number of replies
  $reply = $tweet->reply;
  
  //number of retweets
  $retweet = $tweet->retweet;
  
  //number of favourites
  $favourite = $tweet->favourite;
}
```

## Caveats

This plugin depends on twitter front end html, therefore if the front end is updated by twitter this plugin also needs to be updated for it to continue working. When this case arises, create an issue and it will be resolved as quickly as possible.
