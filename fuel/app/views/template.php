<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <!--?php echo \Asset::css('bootstrap.css'); ?-->
</head>
<body>
    <div id="content">
      <br/>
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