
<?php foreach ($your_request as $request_item): ?>
    <?php echo $request_item['request_id']." | ".$request_item['pickup']." | ".$request_item['dropoff']." | ".$request_item['when']."<br />"; ?>
<?php endforeach ?>