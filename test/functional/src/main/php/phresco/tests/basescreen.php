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
define ('DRU_MENU_HOME_LINK', "link=Home");
define ('DRU_MENU_PRODUCTS_LINK', "link=Products");
define ('DRU_MENU_SPECIALS_LINK', "link=Specials");
define ('DRU_MENU_MYACCOUNT_LINK', "link=My Account");
define ('DRU_MENU_SIGNUP_LINK', "link=Sign Up");
define ('DRU_MENU_SHIPPING_LINK', "link=Shipping");
define ('DRU_MENU_CONTACTUS_LINK', "link=Contact Us");
define ('DRU_MENU_ABOUTUS_LINK', "link=About Us");

//SignUp

define ('DRU_SIGN_UNAME', "id=edit-name");
define ('DRU_SIGN_EMAIL', "id=edit-mail");
define ('DRU_SIGN_PASS1', "id=edit-pass-pass1");
define ('DRU_SIGN_PASS2', "id=edit-pass-pass2");
define ('DRU_SIGN_SUBMIT', "id=edit-submit");
define ('DRU_SIGN_TXTMSG', "Thank you for applying for an account");
define ('DRU_SIGN_PASS', "id=edit-pass");
define ('DRU_SIGN_LOGIN', "link=Log in");
define ('DRU_SIGN_REQ_PASS', "link=Request new password");
define ('DRU_SIGN_MAIL', "id=edit-name");



/*define ('DRU_SIGN_ENT_UNAME', "Watson");
 define ('DRU_SIGN_ENT_EMAIL', "Phresco@photon.net");
 define ('DRU_SIGN_ENT_PASS1', "photon");
 define ('DRU_SIGN_ENT_PASS2', "photon");*/
 define ('DRU_SIGN_TXT_SUC', "Registration successful. You are now logged in.");

//Home
define ('DRU_HOME_NEXT', "//li[8]/a");
define ('DRU_HOME_PREVIOUS', "//div[4]/ul/li[2]/a");
define ('DRU_HOME_LAST', "//li[11]/a");
define ('DRU_HOME_FIRST', "//div[4]/ul/li/a");

//Specials
define ('DRU_SPECIALS_NEXT', "//div[2]/ul/li[3]/a");
define ('DRU_SPECIALS_PREVIOUS', "//div[2]/ul/li[2]/a");
define ('DRU_SPECIALS_LAST', "//div[2]/ul/li[4]/a");
define ('DRU_SPECIALS_FIRST', "//div[2]/ul/li/a");

//ContactUs
define ('DRU_TXT_PRESENT', "link=sales@photoninfotech.net");

//MyAccount
define ('DRU_MYAC_EDIT', "link=Edit");
define ('DRU_MYAC_CURPASS', "id=edit-current-pass");
define ('DRU_MYAC_MAIL', "id=edit-mail");
define ('DRU_MYAC_NEWPASS', "id=edit-pass-pass1");
define ('DRU_MYAC_CONFIRMPASS', "id=edit-pass-pass2");
define ('DRU_MYAC_SAVE', "id=edit-submit");
define ('DRU_MYAC_COFIRM_MSG', "The changes have been saved.");


//AboutUs
define ('DRU_TEXT_PRESENT', "About Us");

//SearchBar
define ('DRU_SEARCH', "name=keys");
define ('DRU_SEARCH_DESK', "audio devices");
define ('DRU_SEARCH_DESK_VAL', "link=AKG B&H Kit C 1000 S Stereo Twin Pack");


define ('DRU_SEARCH_LAP', "Blackberry");
define ('DRU_SEARCH_LAP_VAL', "link=BlackBerry Torch 9800");
define ('DRU_SEARCH_RESULT', "Search results");

define ('DRU_SEARCH_MONI', "name=keys");
define ('DRU_SEARCH_MBOARD', "name=keys");
define ('DRU_SEARCH_NBOOK', "name=keys");
define ('DRU_SEARCH_PROCE', "name=keys");

//define ('DRU_SEARCH_VALUE', "Laptop");
define ('DRU_SEARCH_BUT', "//form/div/div/input");

//Categories
define ('DRU_ACCESSORIES', "link=Accessories");
define ('DRU_AUDIO_DEVICES',"link=Audio Devices");
define ('DRU_CAMERAS', "link=Cameras");
define ('DRU_COMPUTERS', "link=Computers");
define ('DRU_MOBILE_PHONES',"link=Mobile Phones");
define ('DRU_MOVIES_MUSIC', "link=Movies and Music");
define ('DRU_MP3', "link=MP3 Players");
define ('DRU_TABLETS', "link=Tablets");
define ('DRU_TV',"link=Television");
define ('DRU_VGAMES', "link=Video Games");

//Manufacturers
define ('DRU_MANUFACT_ACER', "link=Acer");
define ('DRU_MANUFACT_AKG',"link=Akg");
define ('DRU_MANUFACT_ALURATEK', "link=Aluratek");
define ('DRU_MANUFACT_APPLE', "link=Apple");
define ('DRU_MANUFACT_ARCHOS',"link=Archos");
define ('DRU_MANUFACT_BLACKBERRY', "link=Blackberry");
define ('DRU_MANUFACT_BRACKET1',"link=Bracket1");
define ('DRU_MANUFACT_CANON', "link=Canon");
define ('DRU_MANUFACT_COBY', "link=Coby");
define ('DRU_MANUFACT_DM_ACCESSORIES',"link=DM-Accessories");
define ('DRU_MANUFACT_DOMKE', "link=Domke");
define ('DRU_MANUFACT_HTC', "link=Htc");
define ('DRU_MANUFACT_IMPECCA',"link=impecca");
define ('DRU_MANUFACT_LG', "link=Lg");
define ('DRU_MANUFACT_LOWEPRO',"link=Lowepro");
define ('DRU_MANUFACT_MOTORLOA', "link=Motorloa");
define ('DRU_MANUFACT_MP3',"link=MP3Players");
define ('DRU_MANUFACT_NINTENDO3', "link=Nintendo 3DS");
define ('DRU_MANUFACT_NINTENDO3WII', "link=Nintendo Wii");
define ('DRU_MANUFACT_NOKIA',"link=Nokia");
define ('DRU_MANUFACT_PEARSTONE', "link=Pearstone");
define ('DRU_MANUFACT_PINNACLE',"link=pinnacle");
define ('DRU_MANUFACT_PLAYSTATION', "link=PlayStation 3");
define ('DRU_MANUFACT_VIDEOACCESS', "link=Pro Video Accessories");
define ('DRU_MANUFACT_INSTUUMENTS',"link=Quantum Instruments");
define ('DRU_MANUFACT_RJ', "link=rj");
define ('DRU_MANUFACT_ROKU', "link=roku");
define ('DRU_MANUFACT_SONY',"link=Sony");
define ('DRU_MANUFACT_VELLO', "link=Vello");
define ('DRU_MANUFACT_VIDEOCOPILO',"link=VideoCopilo");
define ('DRU_MANUFACT_XBOX', "link=Xbox 360");


//LatestProductsDetails
define ('DRU_PRODUCT_DET1', "//tr[2]/td[3]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET2', "//tr[2]/td[2]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET3', "//tr[2]/td/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET4', "//td[3]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET5', "//td[2]/div[2]/div/div/a/img");
define ('DRU_PRODUCT_DET6', "//td/div[2]/div/div/a/img");


//CartContent_Add
define ('DRU_PRODUCT_ACCESSOR', "id=edit-submit-101");
define ('DRU_PRODUCT_AUDIODEV', "id=edit-submit-39");
define ('DRU_PRODUCT_DET31', "id=edit-submit-20");
define ('DRU_PRODUCT_DET41', "id=edit-submit-29");
define ('DRU_PRODUCT_DET51', "id=edit-submit-72");
define ('DRU_PRODUCT_MP3', "id=edit-submit-91");
define ('DRU_PRODUCT_DET71', "id=edit-submit-61");
define ('DRU_PRODUCT_TV', "id=edit-submit-10");
define ('DRU_PRODUCT_VGAME', "id=edit-submit-80");

//CommonVariables(Login Details/LogOut)
define ('DRU_LOGIN', "link=Log In");
define ('DRU_LOGOUT', "link=Log out");
define ('DRU_UNAME', "id=edit-name");
define ('DRU_PWORD', "id=edit-pass");
define ('DRU_USER_NAME', "phresco_drupal_user");
define ('DRU_PASS_WORD', "phresco_drupal_user");
define ('DRU_LOGIN_BUTTON', "id=edit-submit");
define ('DRU_TEXT_LOGOUT', "Log out");
define ('DRU_TEXT_LOGOUT_CONFIRM',"Log In");
//define ('DRU_TEXT_LOGIN_CONFIRM',"Log out");
define ('DRU_CART_UPDATE', "//div[2]/input");
define ('DRU_CHECKOUT', "id=edit-checkout");

//InvalidTest
define ('DRU_USER_INVALID_NAME', "phresco_drupal_Photon");
define ('DRU_PASS_INVALID_WORD', "phresco_drupal_Photon");
define ('DRU_USER_INVALID_FORGET_PASS', "link=exact:Have you forgotten your password?");
define ('DRU_PASS_INVALID_MAIL', "id=edit-name");
//define ('DRU_PASS_INVALID__TXT_MAIL', "phresco@photon.com");
define ('DRU_PASS_INVALID_MAIL_BCLICK', "id=edit-submit");
define ('DRU_TXT_PRE_INVALID_MAILID', "Further instructions have been sent to your e-mail address.
");

//RemoveButton
define ('DRU_REMOVE', "id=edit-items-0-remove");
define ('DRU_CONFORM_REMOVE', "removed from your shopping cart.");

//CartContent Delivery Information

define ('DRU_USER_CART', "link=your shopping cart");

define ('DRU_DELI_CFNAME', "id=edit-panes-delivery-delivery-first-name");
define ('DRU_DELI_CLNAME', "id=edit-panes-delivery-delivery-last-name");
define ('DRU_DELI_COMPANY', "id=edit-panes-delivery-delivery-company");
define ('DRU_DELI_STREET1', "id=edit-panes-delivery-delivery-street1");
define ('DRU_DELI_STREET2', "id=edit-panes-delivery-delivery-street2");
define ('DRU_DELI_CITY2', "id=edit-panes-delivery-delivery-city");
define ('DRU_DELI_ZONE', "id=edit-panes-delivery-delivery-zone");
define ('DRU_DELI_ZONE2', "id=edit-panes-delivery-delivery-zone");
define ('DRU_DELI_PCODE', "id=edit-panes-delivery-delivery-postal-code");
define ('DRU_DELI_PH_NUM', "id=edit-panes-delivery-delivery-phone");

/*define ('DRU_DELI_TEX_CFNAME', "Jackson");
 define ('DRU_DELI_TEX_CLNAME', "watson");
 define ('DRU_DELI_TEX_COMPANY', "Phresco");
 define ('DRU_DELI_TEX_STREET1', "Denver street");
 define ('DRU_DELI_TEX_STREET2', "Walltax Road");
 define ('DRU_DELI_TEX_CITY2', "New york");
 define ('DRU_DELI_TEX_ZONE', "California");
 define ('DRU_DELI_TEX_ZONE2', "United States");
 define ('DRU_DELI_TEX_PCODE', "1612356");
 define ('DRU_DELI_TEX_PH_NUM', "+121-9944331916"); */


//CartContent Billing Information

define ('DRU_BILL_INFO', "id=edit-panes-billing-copy-address");
define ('DRU_BILL_CFNAME', "id=edit-panes-billing-billing-first-name");
define ('DRU_BILL_CLNAME', "id=edit-panes-billing-billing-last-name");
define ('DRU_BILL_COMPANY', "id=edit-panes-billing-billing-company");
define ('DRU_BILL_STREET1', "id=edit-panes-billing-billing-street1");
define ('DRU_BILL_STREET2', "id=edit-panes-billing-billing-street2");
define ('DRU_BILL_CITY', "id=edit-panes-billing-billing-city");
define ('DRU_BILL_ZONE', "id=edit-panes-billing-billing-zone");
define ('DRU_BILL_PCODE', "id=edit-panes-billing-billing-postal-code");
define ('DRU_BILL_PH_NUM', "id=edit-panes-billing-billing-phone");

define ('DRU_BILL_CASH', "id=edit-panes-payment-payment-method-cod");
define ('DRU_BILL_CHECK', "id=edit-panes-payment-payment-method-check");

define ('DRU_COMMENTS', "id=edit-panes-comments-comments");
define ('DRU_TXT_COMMENTS', "WELCOME TO DRUPAL");

define ('DRU_REVIEW_ORDER', "id=edit-continue");
define ('DRU_SUBMIT_ORDER', "id=edit-submit");
define ('DRU_BACK', "id=edit-back ");
define ('DRU_CANCEL', "id=edit-cancel");
define ('DRU_CURRENT_STATUS', "link=view your current order status");
define ('DRU_PRINT', "link=Click to open a window with a printable invoice.");


?>