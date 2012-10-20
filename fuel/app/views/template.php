<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>
	Template!
    <div id="content">
      <p>
         <?php
            echo \Html::anchor('events/add', 'Dodaj wydarzenie');
         ?>
      </p>
	  <br/><br/>
      <?php if(isset($messages) and count($messages)>0): ?>
      <div class="message">
         <ul>
         <?php
            foreach($messages as $message)
            {
               echo '<li>', $message,'</li>';
            }
         ?>
         </ul>
      </div>
      <?php endif; ?>
	  <br/>
      <?php echo $content; ?>
   </div>
</body>
</html>