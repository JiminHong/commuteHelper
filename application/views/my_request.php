    <h4>List of requests</h4>

<?php foreach ($my_request as $my_request_item): ?>

    <?php echo $my_request_item['pickup']." | ".$my_request_item['dropoff']." | ".$my_request_item['when']." | ".$my_request_item['user_id']; ?>
    <div
      class="fb-like"
      data-share="true"
      data-width="450"
      data-show-faces="true">
    </div><br>

<?php endforeach ?>