<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
   <div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>

<h4>List of requests</h4>

	<div>
		<a href="<?=site_url('user/logout')?>" style="float: right;">logout</a>
	</div>

	<div>
		<a href="<?=site_url('user/get_public_page')?>" style="float: right;">public_page</a>
	</div>

	<?php foreach ($my_request as $my_request_item): ?>

		<h1 id="request_id"><?php echo $my_request_item['request_id'];?></h1>
		<button><a onclick='postToFeed(); return false;'>Post to Feed</a></button>

		<?php echo $my_request_item['pickup']." | ".$my_request_item['dropoff']." | ".$my_request_item['when']; ?>

		
		<p id='msg'></p>

	<?php endforeach ?>

	<script>
      	FB.init({appId: "728599323911324", status: true, cookie: true});
      	function postToFeed() {
 			// var request_id = <?php echo $my_request_item['request_id']?>;
 			var request_id = document.getElementById("request_id").innerHTML;
 			var my_link = 'http://localhost:8888/user/get_request_id?request_id='+request_id+'&searchbtn=search';
	        // calling the API ...
	        var obj = {
	          method: 'feed',
	          redirect_uri: 'http://localhost:8888/user/login',
	          link: my_link,
	          picture: 'http://fbrell.com/f8.jpg',
	          name: 'Ride Request - commuteHelper',
	          caption: 'I will need a ride soon!',
	          description: 'Give a ride and get money prize!'
	        };
 
        	function callback(response) {
          		document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        	}
 
        FB.ui(obj, callback);
      }
    </script>


</body>
</html>
