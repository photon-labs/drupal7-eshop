/**
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
 */
package com.photon.phresco.uiconstants;


import java.io.IOException;
import java.lang.reflect.Field;

public class UIConstants {
	
	private ReadXMLFile readXml;
	
 	public String SIGNUPLINK="signuplink";
 	public String USERNAME="username";
    public String EMAILFILED="emailfield";
    public String PASSWORD="password";
    public String PASSWORDLOGIN="passwordlogin";
    public String CONFIRMPASSWORD="confirmpassword";
    public String SUBMITBUTTON="buttonclick";
    public String MYACCOUNT="myaccount";
    public String LOGOFFBUTTON="logoff";
    public String LOGIN="login";
	public String REQUESTLINK="rlink";
	public String EMAILTEXTFIELD="etextfield";
	public String REQUESTBUTTON="rbuttonclick";
	public String HOME="home";
	public String CONTACTUS="contactus";
	public String ABOUTUS="aboutus";
	public String SEARCHPRODUCTS="searchproducts";
	public String SEARCH="search";
	public String MOVIEANDMUSIC="movieandmusics";
	public String MP3PLAYER="mp3player";	
	public String TABLETS="tablets";	
	public String TELEVISION="television";
	public String VIDEOGAMES="videogames";
    public String ACCESSORIES="accessories";
    public String ADDTOCART1="addtocart1";
    public String QUANTITY1="quantity1";
    public String UPDATECART1="updatecart1";
    public String AUDIODEVICE="audiodevice";
    public String ADDTOCART2="addtocart2";   
    public String UPDATECART2="updatecart2";
    public String CAMERAS="cameras";  
    public String ADDTOCART3="addtocart3";
    public String UPDATECART3="updatecart3";
    public String COMPUTERS="computers";
    public String ADDTOCART4="addtocart4"; 
    public String UPDATECART4="updatecart4";
    public String MOBILEPHONES="mobilephones";
    public String ADDTOCART5="addtocart5";
    public String REMOVE="remove";
    public String REMOVE1="remove1";
    public String UPDATECART5="updatecart5";
    public String CHECKOUT="checkout";    
    public String FIRSTNAME="firstname";
    public String LASTNAME="lastname";
    public String COMPANY="company";
    public String STREETADDRESS1="streetaddress1";
    public String STREETADDRESS2="streetaddress2";
    public String CITY="city";
    public String POSTELCODE="postelcode";
    public String BILLINGADDCHECK="billingaddcheck";
    public String ORDERCOMM="ordercomm";
    public String REVIEWORDER="revieworder";
    public String CHECKOUTSUBMIT="checkoutsubmit";
	public String NEXT="next";
	public String NEXT1="next1";
	public String SELECT="select";
	public String UPDATESELECT="updateselect";
	public String SHOPPING="shopping";
	public String REMOVECART="removecart";
	public String ADDTOCART6="addtocart6";
	public String ADDTOCART7="addtocart7";
	public String ADDTOCART8="addtocart8";
	public String ADDTOCART9="addtocart9";
	public String ADDTOCART10="addtocart10";
	
	
	
	
	
    
    /**
	 * Reading the UIConstants xml environment through UIConstants() Constructor 
	 */
	
	public UIConstants() {
		try {
			readXml = new ReadXMLFile();
			readXml.loadUIConstants();
			Field[] arrayOfField1 = super.getClass().getFields();
			Field[] arrayOfField2 = arrayOfField1;
			int i = arrayOfField2.length;
			for (int j = 0; j < i; ++j) {
				Field localField = arrayOfField2[j];
				Object localObject = localField.get(this);
				if (localObject instanceof String)
					localField
							.set(this, readXml.getValue((String) localObject));

			}
		} catch (Exception localException) {
			throw new RuntimeException("Loading "
					+ super.getClass().getSimpleName() + " failed",
					localException);
		}
	}
}
