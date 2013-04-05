<?php /*
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2013 Photon Infotech Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *         http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/ ?>
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
