/**
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2014 Photon Infotech Inc.
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
import com.photon.phresco.model.DrupalEshops.DrupalEshopData;
import com.photon.phresco.uiconstants.CommonDrupalData;
import com.photon.phresco.uiconstants.PhrescoUiConstants;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class WelcomePageTestCase {

	private UIConstants uiConstants;
	private PhrescoUiConstants phrescoUIConstants;
	private WelcomeScreen welcomeScreen;
	private String methodName;
	private String selectedBrowser;
	private CommonDrupalData drupalConstants;
	private UserInfoConstants userInfo;

	/**
	 * Initializing the Object of a class PhrescoUiConstants, UIConstants,
	 * DrupalData, UserInfoConstants
	 * 
	 * @throws Exception
	 */

	@Parameters(value = { "browser", "platform" })
	@BeforeTest
	public void setUp(String browser, String platform) throws Exception {
		try {
			phrescoUIConstants = new PhrescoUiConstants();
			uiConstants = new UIConstants();
			drupalConstants = new CommonDrupalData();
			userInfo = new UserInfoConstants();
			String selectedBrowser = browser;
			String selectedPlatform = platform;

			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			System.out.println("Selected Browser to execute testcases--->>"
					+ selectedBrowser);
			String applicationURL = phrescoUIConstants.getProtocol() + "://"
					+ phrescoUIConstants.getHost() + ":"
					+ phrescoUIConstants.getPort() + "/";
			welcomeScreen = new WelcomeScreen(selectedBrowser,
					selectedPlatform, applicationURL,
					phrescoUIConstants.getContext(), drupalConstants,
					uiConstants, userInfo);
		} catch (Exception exception) {
			exception.printStackTrace();
		}
	}

	/**
	 * 
	 * @throws InterruptedException
	 * @throws IOException
	 * @throws Exception
	 *             In this Method just triggering testcases
	 */

	@Test
	public void testARegister() throws InterruptedException, IOException,
			Exception {
		try {

			System.out.println("---------Registration-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.RegisterCheck(methodName);

		} catch (Exception t) {
		}

	}

	@Test
	public void testCRequestNew() throws InterruptedException, IOException,
			Exception {
		try {

			System.out.println("---------RequestNew-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.RequestNewPassword(methodName);

		} catch (Exception t) {
		}

	}

	@Test(dataProvider = "drupal7Data", dataProviderClass = com.photon.phresco.uiconstants.TestDataProvider.class)
	public void testDCategoryBlog(DrupalEshopData drupalData)
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToCategoryLink()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			welcomeScreen.billInfo(methodName, drupalData);
			welcomeScreen.checkoutCategory(methodName, drupalData);
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}

	@Test(dataProvider = "drupal7Data", dataProviderClass = com.photon.phresco.uiconstants.TestDataProvider.class)
	public void testECategoryBilling(DrupalEshopData drupalData)
			throws InterruptedException, IOException, Exception {
		try {

			System.out
					.println("---------testToCategoryCheckOut()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.billInfo1(methodName, drupalData);
			welcomeScreen.checkoutCategory(methodName, drupalData);

		} catch (Exception t) {
			t.printStackTrace();

		}
	}

	@Test
	public void testFSpecialTab() throws InterruptedException, IOException,
			Exception {
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
	public void testGShoppingCart() throws InterruptedException, IOException,
			Exception {
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
	public void testHAboutUs() throws InterruptedException, IOException,
			Exception {
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
	public void testIContactUs() throws InterruptedException, IOException,
			Exception {
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
	public void testJSearch() throws InterruptedException, IOException,
			Exception {
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
	public void testKLoggoff() throws InterruptedException, IOException,
			Exception {
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
	 * Triggering close method in BaseScreen
	 */

	@AfterTest
	public void tearDown() {
		welcomeScreen.closeBrowser();
	}

}