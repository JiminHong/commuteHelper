<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
   <div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>

    

	<form action="<?=site_url('user/get_request_id')?>" method="get">

	    <label for="request_id">Enter the request id</label>
	    <input type="text" name="request_id" id="request_id" value="<?=set_value('request_id') ?>"/>

	    <input type="button" onclick='postToFeed(); return false;' value='Post to Feed'/>
		<!-- <input type="submit" value="search" name="searchbtn"/> -->
	</form>

	<script>
      	FB.init({appId: "728599323911324", status: true, cookie: true});
      	
      	function postToFeed() {
 			var request_id = document.getElementById("request_id").value;
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

























