<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<ul class="left_menu">
<?php $i=1; foreach ($rows as $id => $row): ?>
<?php 
if($i%2 == 0)
$cls = "odd";
else $cls = "even"; 
?>
<li class="<?php echo $cls;?> ">
  <!--<div class="<?php //print $classes_array[$id]; ?>">-->
    <?php print $row;  ?>
</li>	
  <!--</div>-->
<?php $i++; endforeach; ?>
</ul>
