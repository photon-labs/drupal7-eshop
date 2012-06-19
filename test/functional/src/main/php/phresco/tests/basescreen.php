<?php /*
 * ###
 * PHR_DrupalEshop
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php 
/*

Author by {phresco} QA Automation Team

*/

define ('WAIT_FOR_NEXT_LINE',"2");
define ('WAIT_FOR_NEXT_LINES',"5");
define ('WAIT_FOR_NEXT_PAGES', "60000");
define ('WAIT_FOR_SEC',"2");

//MenuBarLinks
define ('DRU_MENU_HOME_LINK', "Home");
define ('DRU_MENU_PRODUCTS_LINK', "Products");
define ('DRU_MENU_SPECIALS_LINK', "Specials");
define ('DRU_MENU_MYACCOUNT_LINK', "My account");
define ('DRU_MENU_SIGNUP_LINK', "Sign Up");
define ('DRU_MENU_SHIPPING_LINK', "Shipping");
define ('DRU_MENU_CONTACTUS_LINK', "Contact Us");
define ('DRU_MENU_ABOUTUS_LINK', "About Us");

//Login
define('DRU_LOGIN_TEXT',"Log In");
define('DRU_LOGIN_UNAME',"//input[@id='edit-name']");
define('DRU_LOGIN_PASS',"//input[@id='edit-pass']");
define('DRU_LOGIN_CLICK_BUT',"//input[@id='edit-submit']");

//LogOut
define('DRU_LOGOUT_TEXT',"Log out");

//SignUp

define ('DRU_SIGN_UNAME', "//input[@id='edit-name']");
define ('DRU_SIGN_EMAIL', "//input[@id='edit-mail']");
define ('DRU_SIGN_PASS1', "//input[@id='edit-pass-pass1']");
define ('DRU_SIGN_PASS2', "//input[@id='edit-pass-pass2']");
define ('DRU_SIGN_SUBMIT', "//input[@id='edit-submit']");
define ('DRU_SIGN_TXTMSG', "Thank you for applying for an account");

define ('DRU_SIGN_REQ_PASS', "//a[contains(text(),'Request new password')]");
define ('DRU_SIGN_MAIL', "//input[@id='edit-name']");
define ('DRU_SIGN_REQ_PASS_MAIL',"//input[@id='edit-submit']");
define ('DRU_SIGN_TXT_SUC', "Registration successful. You are now logged in.");

//Home
define ('DRU_HOME_NEXT', "//li[8]/a");
define ('DRU_HOME_PREVIOUS', "//div[4]/ul/li[2]/a");
define ('DRU_HOME_LAST', "//li[9]/a");
define ('DRU_HOME_FIRST', "//div[4]/ul/li/a");

//Specials
define ('DRU_SPECIALS_NEXT', "//div[2]/ul/li[3]/a");
define ('DRU_SPECIALS_PREVIOUS', "//div[2]/ul/li[2]/a");
define ('DRU_SPECIALS_LAST', "//div[2]/ul/li[4]/a");
define ('DRU_SPECIALS_FIRST', "//div[2]/ul/li/a");

//ContactUs
define ('DRU_TXT_PRESENT', "//p/a");
define('DRU_CONTACT_TEXT_PRESENT',"Contact Sales");

//MyAccount
define ('DRU_MYAC_EDIT', "//a[contains(text(),'Edit')]");
define ('DRU_MYAC_CURPASS', "//input[@id='edit-current-pass']");
define ('DRU_MYAC_MAIL', "//input[@id='edit-mail']");
define ('DRU_MYAC_NEWPASS', "//input[@id='edit-pass-pass1']");
define ('DRU_MYAC_CONFIRMPASS', "//input[@id='edit-pass-pass2']");
define ('DRU_MYAC_SAVE', "//input[@id='edit-submit']");
define ('DRU_MYAC_COFIRM_MSG', "The changes have been saved.");


//AboutUs
define ('DRU_TEXT_PRESENT', "About Us");

//SearchBar
define ('DRU_SEARCH', "//input[@id='edit-keys']");
define ('DRU_SEARCH_DESK', "audio devices");
define ('DRU_SEARCH_DESK_VAL', "//li[3]/h3/a");
define ('DRU_SEARCH_PRODUCT_INFO',"//a[@href='http://localhost/drupal/node/40']");
define ('SEARCH_PRODUCT_RESULT',"AKG C3000 Studio Microphone");


/*define ('DRU_SEARCH_LAP', "Blackberry");
define ('DRU_SEARCH_LAP_VAL', "//h3/a");*/
define ('DRU_SEARCH_RESULT', "Search results");

/*define ('DRU_SEARCH_VALUE', "Laptop");*/
define ('DRU_SEARCH_BUT', "//input[@id='edit-submit--2']"); 

//Categories
define ('DRU_ACCESSORIES', "Accessories");
define ('DRU_AUDIO_DEVICES',"Audio Devices");
define ('DRU_CAMERAS', "Cameras");
define ('DRU_COMPUTERS', "Computers");
define ('DRU_MOBILE_PHONES',"Mobile Phones");
define ('DRU_MOVIES_MUSIC', "Movies and Music");
define ('DRU_MP3', "MP3 Players");
define ('DRU_TABLETS', "Tablets");
define ('DRU_TV',"Television");
define ('DRU_VGAMES', "Video Games");

//Manufacturers
define ('DRU_MANUFACT_ACER', "//div[2]/div/div/ul/li/div/span/a");
define ('DRU_MANUFACT_AKG',"//div[2]/div/div/ul/li[2]/div/span/a");
define ('DRU_MANUFACT_ALURATEK', "//div[2]/div/div/ul/li[3]/div/span/a");
define ('DRU_MANUFACT_VELLO', "//li[29]/div/span/a");
define ('DRU_MANUFACT_XBOX', "//li[31]/div/span/a");
define ('DRU_MANUFACT_CANON', "//div[2]/div/div/ul/li[8]/div/span/a");


//LatestProductsDetails
define ('DRU_PRODUCT_DET1', "//tr[2]/td[3]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET2', "//tr[2]/td[2]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET3', "//tr[2]/td/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET4', "//td[3]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET5', "//td[2]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET6', "//td/div[2]/div/div/a/img");


//CartContent_Add
define ('DRU_PRODUCT_ACCESSOR', "//input[@id='edit-submit-101']");
define ('DRU_PRODUCT_COMPUTER', "//input[@id='edit-submit-20']");
define ('DRU_PRODUCT_TABLET', "//input[@id='edit-submit-62']");
define ('DRU_PRODUCT_MOBILE', "//input[@id='edit-submit-30']");
define ('DRU_PRODUCT_VGAME', "//input[@id='edit-submit-82']");





//RemoveButton
define ('DRU_REMOVE', "//tr[2]/td[5]/input");
define ('DRU_CONFORM_REMOVE', "removed from your shopping cart.");

//CartContent Delivery Information

define ('DRU_CHECK_OUT',"//input[@id='edit-checkout']");

define ('DRU_DELI_CFNAME', "//input[@id='edit-panes-delivery-delivery-first-name']");
define ('DRU_DELI_CLNAME', "//input[@id='edit-panes-delivery-delivery-last-name']");
define ('DRU_DELI_STREET1', "//input[@id='edit-panes-delivery-delivery-street1']");
define ('DRU_DELI_CITY2', "//input[@id='edit-panes-delivery-delivery-city']");
define ('DRU_DELI_ZONE', "//select[@id='edit-panes-delivery-delivery-zone']");
define ('DRU_DELI_PCODE', "//input[@id='edit-panes-delivery-delivery-postal-code']");
define ('DRU_BILL_CASH', "//input[@id='edit-panes-payment-payment-method-cod']");
define ('CHOOSE_BILL_INFO',"//input[@id='edit-panes-billing-copy-address']");

define ('DRU_COMMENTS', "//textarea[@id='edit-panes-comments-comments']");
define ('DRU_TXT_COMMENTS', "Welcome To DRUPAL Eshop Application");

define ('DRU_REVIEW_ORDER', "//input[@id='edit-continue']");
define ('DRU_SUBMIT_ORDER', "//input[@id='edit-submit']");

define ('DRU_COMPLETE_CHECKOUT', "Your order is complete!");






?>