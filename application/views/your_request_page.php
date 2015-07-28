<?php foreach ($your_request as $request_item): ?>
    <?php echo $request_item['pickup']." | ".$request_item['dropoff']." | ".$request_item['when']." | ".$request_item['user_id']."<br />"; ?>
<?php endforeach ?>
