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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Phresco Framework</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
  </head>

  <body>

    <div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container">
          <ul class="nav">
			<li><?php if ($logo): ?>
              <a href="<?php echo base_path(); ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" /></a>
            <?php endif; ?>
			</li>
            <!--<li class="active"><a href="main.html">Home</a></li>
            <li><a href="application.html">Application</a></li>
			<li><a href="#">Documentation</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About Us</a></li>-->
          </ul>
		   <?php 
		   global $user;
		   //if ($primary_nav): print $primary_nav; endif; ?>
		   <div style="float:right;">
	          <ul class="nav secondary-nav">
		   <?php if($user->uid == 0) { ?>
	            <!--<li class="dropdown"><a href="#example" class="openModal">Log In</a>-->
				<li class="dropdown"><a href="<?php echo base_path(); ?>user">Log In</a>
				<!--<aside id="example" class="popup">
				<div>
				<?php
					//$elements = drupal_get_form('user_login_block');
				/**	do all your rendering stuff here**/
					//$rendered = drupal_render($elements);
				?>
					<!--<div class="login">-->
						<?php //print_r($rendered); ?>
					<!--<div class="login">--
						<!--<p class="login_label"><span>Username</span>&nbsp;&nbsp;
							<input type="text" id="username" name="username" size="15" class="login_input"></p><br>
							
							<p class="login_label"> <span>Password</span>&nbsp;&nbsp;
							<input type="password" id="password" name="password" size="15" class="login_input"></p><br>
							
							<input type="button" value="Login" name="login" class="redbtn">
						<div class="loginlinks"><a href="#" class="spacing">Forgot password</a> | <a href="#" class="spacing"> Register </a></div>-->
				<!--</div>--
					<a title="Close" href="#close"></a>	
				</div>
			</aside>-->
			
			
			<!--<ul class="dropdown-menu">
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li class="divider"></li>
                <li><a href="#">Discover</a></li>
              </ul>-->
			  </li>
		  <?php } else { ?>
	            <li class="dropdown"><a href="<?php echo base_path(); ?>user/logout">Log out</a></li>
		  <?php } ?>
          </ul>
		 	</div> 
           <div class="top_search">
				<div class="search_text"></div>
					<?php
				$search_elements = drupal_get_form('search_form');
				/**do all your rendering stuff here**/
				$search_rendered = render($search_elements);
				?>
					<!--<div class="login">-->
						<?php print_r($search_rendered); ?>
					<div id="search" class="container-inline">
 						 <?php //print $drupal_get_form['search_block_form']; ?><?php //print $search['submit']; ?>
					</div>
					<!--<input type="image" src="<?php //echo $base_path.path_to_theme();?>/images/search.gif" width="14" height="14" class="search_bt"/>-->
			</div>

		  
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div><!-- /topbar-wrapper -->
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
			<h2 style="color:#FFFFFF"><?php print $site_name ?></h2>
			<?php if($user->uid > 0) { ?> <h2 style="float:right; color:#cccccc;">Welcome <?php echo $user->name;?></h2> <?php }?>
        <p><?php print $site_slogan; ?></p>
        
      </div>
		
		<!-- menu tab start -->
		
		<div id="main_content"> 
   
            <div id="menu_tab">
            <div class="left_menu_corner"></div>
                   <!-- <ul class="menu">
                         <li><a href="index.html" class="nav1">  Home </a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav2">Products</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav3">Specials</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav4">My account</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav4">Sign Up</a></li>
                         <li class="divider"></li>                         
                         <li><a href="#" class="nav5">Shipping </a></li>
                         <li class="divider"></li>
                         <li><a href="contact.html" class="nav6">Contact Us</a></li>
                         <li class="divider"></li>
						 <li><a href="contact.html" class="nav6">About Us</a></li>
                         <li class="divider"></li>
                    </ul>-->
					<?php //echo menu_links_array(); //print_r(menu_navigation_links('menu-secondary-menu')) ?>
					<?php print render($page['content_top_menu']); //print $content_top_menu; ?>
             <div class="right_menu_corner"></div>
            </div><!-- end of menu tab -->
<!--       <span style="float:right; padding-right:10px;">Welcome !</span> 
-->	 
	<?php //if($breadcrumb): ?>       
<!--		    <div class="crumb_navigation">
		   <?php //print $breadcrumb; ?>
	    </div>        
-->	
<?php // endif;?>	
	
    
    
   <div class="left_content">
  	 <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="sidebar">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php endif; ?>
<!--    <div class="title_box">Categories</div>
        <ul class="left_menu">
        <li class="odd"><a href="services.html">Processors</a></li>
        <li class="even"><a href="services.html">Motherboards</a></li>
         <li class="odd"><a href="services.html">Desktops</a></li>
        <li class="even"><a href="services.html">Laptops & Notebooks</a></li>
         <li class="odd"><a href="services.html">Processors</a></li>
         <li class="even"><a href="services.html">Motherboards</a></li>
        <li class="odd"><a href="services.html">Processors</a></li>
        <li class="even"><a href="services.html">Motherboards</a></li>
         <li class="odd"><a href="services.html">Desktops</a></li>
        <li class="even"><a href="services.html">Laptops & Notebooks</a></li>
         <li class="odd"><a href="services.html">Processors</a></li>
         <li class="even"><a href="services.html">Motherboards</a></li>
        </ul> -->
        
    <!-- <div class="title_box">Special Products</div>  
     <div class="border_box">
         <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
         <div class="product_img"><a href="details.html"><img src="<?php echo $base_path.path_to_theme();?>/images/laptop.png" alt="" title="" border="0" /></a></div>
         <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
     </div>  -->
     
    <!-- <div class="title_box">Newsletter</div>  
     <div class="border_box">
		<input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">join</a>
     </div>  
     
     <div class="banner_adds">
     
     <a href="#"><img src="<?php echo $base_path.path_to_theme();?>/images/bann2.jpg" alt="" title="" border="0" /></a>
	 
     </div>   
        -->
    
   </div>
   <!-- end of left content -->
   
   <div class="center_content">
    <?php print $messages; ?>
   <?php if ($title): ?>
          <!--<div class="center_title_bar"><?php //print $title ?></div>-->
		   <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>

    <?php endif; ?>
   
    <?php print render($page['content']); ?>
</div>
   <!-- end of center content -->
   
 <div class="right_content">
<?php  print render($page['sidebar_second']); //echo $GLOBALS['user']->uid;?> 
</div>

</div>

   <!-- end of right content -->   
   </div>
		<!-- ends ths content with menu tab-->
</div>      
    </div> <!-- /container -->
	 <?php print render($page['footer']); ?>

  </body>
</html>
