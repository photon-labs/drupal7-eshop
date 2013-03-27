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
package com.photon.phresco.testcases;

import java.io.IOException;


import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Parameters;
import org.testng.annotations.Test;

import com.photon.phresco.Screens.WelcomeScreen;
import com.photon.phresco.uiconstants.DrupalData;
import com.photon.phresco.uiconstants.PhrescoUiConstants;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class WelcomePageTestCase {

	private  UIConstants uiConstants;
	private  PhrescoUiConstants phrescoUIConstants;
	private  WelcomeScreen welcomeScreen;
	private  String methodName;
	private  String selectedBrowser;
	private  DrupalData drupalConstants;
	private  UserInfoConstants userInfo;

	/**
	 * Initializing the Object of a class PhrescoUiConstants, UIConstants, DrupalData, UserInfoConstants
	 * @throws Exception
	 */

	@Parameters(value = { "browser", "platform" })
	@BeforeTest
	public  void setUp(String browser, String platform) throws Exception {
		try {
			phrescoUIConstants = new PhrescoUiConstants();
			uiConstants = new UIConstants();
			drupalConstants = new DrupalData();
			userInfo = new UserInfoConstants();
			String selectedBrowser = browser;
			String selectedPlatform = platform;
			
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			/*Reporter.log("Selected Browser to execute testcases--->>"
					+ selectedBrowser);*/
			System.out
			.println("Selected Browser to execute testcases--->>"
					+ selectedBrowser);
			String applicationURL = phrescoUIConstants.PROTOCOL + "://"
					+ phrescoUIConstants.HOST + ":" + phrescoUIConstants.PORT
					+ "/";
			welcomeScreen = new WelcomeScreen(selectedBrowser,selectedPlatform, applicationURL,
					phrescoUIConstants.CONTEXT, drupalConstants, uiConstants, userInfo);
		} catch (Exception exception) {
			exception.printStackTrace();
		}
	}
	
	/**
	 * Capturing the URL values through String & passing those values into WelcomeScreen
	 * @throws Exception
	 */

	/*public  void launchingBrowser() throws Exception {
		try {
			String applicationURL = phrescoUIConstants.PROTOCOL + "://"
					+ phrescoUIConstants.HOST + ":" + phrescoUIConstants.PORT
					+ "/";
			selectedBrowser = phrescoUIConstants.BROWSER;
			welcomeScreen = new WelcomeScreen(selectedBrowser,selectedPlatform, applicationURL,
					phrescoUIConstants.CONTEXT, drupalConstants, uiConstants, userInfo);
		} catch (Exception exception) {
			exception.printStackTrace();

		}

	}*/
	
	/**
	 * 
	 * @throws InterruptedException
	 * @throws IOException
	 * @throws Exception
	 * In this Method just triggering testcases
	 */
	
	
	@Test
	public void testARegister()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Registration-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.RegisterCheck(methodName);
			
		} catch (Exception t) {
	  }

	}
	
	
	@Test
	public void testBLogin()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Login-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.loginDrupal(methodName);
			
		} catch (Exception t) {
	  }

	}
	
	
	@Test
	public void testCRequestNew()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------RequestNew-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.RequestNewPassword(methodName);
			
		} catch (Exception t) {
	  }

	}
	
	
	@Test
	public void testDCategoryBlog()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToCategoryLink()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			
			welcomeScreen.categorySelect(methodName);
			welcomeScreen.CategorySelectLast(methodName);
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testECategoryBilling()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToCategoryCheckOut()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.checkoutCategory(methodName);

		
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	
	@Test
	public void testFSpecialTab()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToSpecialTab()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.homeSpecialTab(methodName);
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	@Test
	public void testGShoppingCart()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToShoppingCart()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			
			welcomeScreen.homeShoppingCart(methodName);
		
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testHAboutUs()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Aboutus()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
				    
		    welcomeScreen.aboutUs(methodName);

		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	@Test
	public void testIContactUs()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Cantactus()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
		    welcomeScreen.contactUs(methodName);

		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testJSearch()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Search()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			
		    welcomeScreen.searchProducts(methodName);

		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testKLoggoff()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------Logoff()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
		  
			welcomeScreen.logOff(methodName);

		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	
	/**
	 * 	Triggering close method in BaseScreen 
	 */
	
	@AfterTest
	public  void tearDown() {
		welcomeScreen.closeBrowser();
	}

}