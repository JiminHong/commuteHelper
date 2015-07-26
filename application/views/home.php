<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div>
		<a href="<?=site_url('user/logout')?>" style="float: right;">logout</a>
	</div>

  <div>
    <a href="<?=site_url('user/view_my_request')?>" style="float: right;">my_request</a>
  </div>

	<div>
		<?php echo "Welcome ".$this->session->userdata('username');
			$the_username = $this->session->userdata('username');
      echo "<br>user id ".$this->session->userdata('user_id');
		?>
	</div>

	<h4>Request ride</h4>
        <div id="request_form">
            <form action="<?=site_url('user/do_request')?>" method="post">
            	<p><?echo $the_username;?></p>
                <label for="pickup">Pick up location</label>
                <input type="text" name="pickup" value="<?=set_value('pickup') ?>"/>

                <label for="dropoff">Drop off location</label>
                <input type="text" name="dropoff" value="<?=set_value('dropoff') ?>" />

                <label for="when">When</label>
                <input type="date" name="when"/>

            <input type="submit" value="Request ride" name="request"/>
            
            </form>
        </div>
    <h4>List of requests</h4>

    <?php foreach ($request as $request_item): ?>

        <?php echo $request_item['pickup']." | ".$request_item['dropoff']." | ".$request_item['when']." | ".$request_item['user_id']; ?><br />
        <!-- <a onclick='postToFeed(); return false;'>Post to Feed</a>
    <p id='msg'></p> -->
    <?php endforeach ?>
    
    <br />

    <div class="error">
    <?php echo validation_errors(); ?>
    </div>





    