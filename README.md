# twitter-feeder
Get the twitter feed of any public twitter user.

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


