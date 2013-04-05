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
//echo "<pre>";
//print_r($content);
//echo "</pre>";
?>
	<div class="center_title_bar"><?php print render($title); ?></div>
      	<div class="prod_box_big">
        	<div class="top_prod_box_big"></div>
            <div class="center_prod_box_big">            
	       <!--<a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]">-->
			   <div class="product_img_big">
					   <?php print render($content['uc_product_image']); ?><!--</a>-->
                 <div class="thumbs">
                 <a href="#" ><img src="<?php echo base_path().path_to_theme();?>/images/thumb1.gif" alt="" title="" border="0" /></a>
                 <a href="#"><img src="<?php echo base_path().path_to_theme();?>/images/thumb1.gif" alt="" title="" border="0" /></a>
                 <a href="#" ><img src="<?php echo base_path().path_to_theme();?>/images/thumb1.gif" alt="" title="" border="0" /></a>
                 </div>
				 </div>
                 
                     <div class="details_big_box">
                         <div class="product_title_big"><a href="<?php echo base_path().'node/'.$node->nid; ?>"><?php print render($title); //print_r($node);?></a></div>
						 <div><span class="desc"><?php echo $node->body['und'][0]['value'] ; ?></span></div>
                         <div class="specifications">
						 	<?php //print render($content['brand']['title']); ?>
                            Model: <span class="blue"><?php print render($model); ?></span><br />
							Weight: <span class="blue"><?php print render($weight); echo $node->weight_units;?></span><br />
							Dimensions: <span class="blue"><?php print $node->length.' '.$node->length_units.' x '.$node->width.' '.$node->length_units.' x '.$node->height.' '.$node->length_units.' x '; ?></span><br />
							List Price: <span class="reduce"><?php print number_format($node->list_price,2); ?></span><br />
							Sell Price: <span class="price"><?php print render($content['sell_price']); ?></span><br />
                          </div>  
                         <!--<div class="prod_price_big"><span class="reduce"><?php //print render($content['list_price']); ?></span> <span class="price"><?php //print render($content['sell_price']); ?></span></div>-->
						 <div style="float:right;"><?php print render($content['add_to_cart']); ?></div>
                       <!--  <a class="addtocart"><?php //print render($content['add_to_cart']); ?></a>-->
						 <!-- <a href="#" class="compare">compare</a>-->
                     </div>                        
            </div>
            <div class="bottom_prod_box_big"></div>                                
        </div>
    <?php //print render($content['field_category']); ?><br />
							<?php //print render($content['cost']); ?><br />
							<?php //print render($content['height']); ?><br />
							<?php //print render($content['length']); ?><br />
                           <!-- Sell Price: <span class="blue">24 luni</span><br />-->
