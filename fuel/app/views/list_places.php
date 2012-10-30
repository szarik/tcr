<?php
/**
 * Listing view, views/listing.php
 */
if($places):
   foreach($places as $row):
?>
<div class="post">
   <h2><?php echo $row->name; ?> <small><?php echo \Html::anchor('places/edit/'.$row->id, '[Edytuj]');?></small></h2>
   <p><?php echo $row->description; ?></p>
   <p> <?php echo $row->address; ?></p>
    <p>  <?php echo $row->open_time; ?></p>
    <p>  <?php echo $row->coordinates; ?></p>
   </p>
</div>
<?php
   endforeach;
endif;
?>