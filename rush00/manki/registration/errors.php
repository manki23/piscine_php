<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<?php  if (count($popups) > 0) : ?>
  <div class="popup">
  	<?php foreach ($popups as $popup) : ?>
  	  <p><?php echo $popup ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>