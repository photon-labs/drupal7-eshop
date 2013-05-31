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
package com.photon.phresco.Screens;

import java.awt.AWTException;
import java.io.File;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.List;

import org.apache.commons.io.FileUtils;
import org.apache.commons.lang.StringUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
//import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.Platform;
import org.openqa.selenium.TakesScreenshot;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriverService;
import org.openqa.selenium.remote.Augmenter;
import org.openqa.selenium.remote.CapabilityType;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.testng.Assert;

import com.google.common.base.Function;
import com.photon.phresco.model.DrupalEshops.DrupalEshopData;
import com.photon.phresco.selenium.util.Constants;
import com.photon.phresco.selenium.util.GetCurrentDir;
import com.photon.phresco.selenium.util.ScreenActionFailedException;
import com.photon.phresco.selenium.util.ScreenException;
import com.photon.phresco.uiconstants.CommonDrupalData;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class BaseScreen {

	private WebDriver driver;
	private ChromeDriverService chromeService;
	private Log log = LogFactory.getLog("BaseScreen");
	private WebElement element;
	private CommonDrupalData commondrupalConstants;
	private UIConstants uiConstants;
	private UserInfoConstants userInfo;
	DesiredCapabilities capabilities;

	public BaseScreen() {

	}

	/**
	 * Invoking the super class method through passing the vale of Browser,URL,
	 * Context, then PhpData,UIConstants,UserInfoConstants Xml Values Then
	 * triggering instantiateBrowser
	 * 
	 * @throws ScreenException
	 */
	public BaseScreen(String selectedBrowser, String selectedPlatform,
			String applicationURL, String applicationContext,
			CommonDrupalData commondrupalConstants, UIConstants uiConstants,
			UserInfoConstants userInfo) throws AWTException, IOException,
			ScreenActionFailedException {

		this.commondrupalConstants = commondrupalConstants;
		this.uiConstants = uiConstants;
		this.userInfo = userInfo;
		try {
			instantiateBrowser(selectedBrowser, selectedPlatform,
					applicationURL, applicationContext);
		} catch (ScreenException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public void instantiateBrowser(String selectedBrowser,
			String selectedPlatform, String applicationURL,
			String applicationContext) throws ScreenException,
			MalformedURLException {

		URL server = new URL("http://localhost:4444/wd/hub/");
		if (selectedBrowser.equalsIgnoreCase(Constants.BROWSER_CHROME)) {
			log.info("-------------***LAUNCHING GOOGLECHROME***--------------");
			try {

				/*
				 * chromeService = new ChromeDriverService.Builder()
				 * .usingChromeDriverExecutable( new File(getChromeLocation()))
				 * .usingAnyFreePort().build(); log.info(
				 * "-------------***LAUNCHING GOOGLECHROME***--------------");
				 * chromeService.start();
				 */
				capabilities = new DesiredCapabilities();
				capabilities.setBrowserName("chrome");
				/*
				 * break; capabilities.setPlatform(Platform)
				 * capabilities.setPlatform(selectedPlatform); driver = new
				 * RemoteWebDriver(server, capabilities);
				 */
			} catch (Exception e) {
				e.printStackTrace();
			}

		} else if (selectedBrowser.equalsIgnoreCase(Constants.BROWSER_IE)) {
			log.info("---------------***LAUNCHING INTERNET EXPLORE***-----------");
			try {
				capabilities = new DesiredCapabilities();
				capabilities.setJavascriptEnabled(true);
				capabilities.setBrowserName("iexplorer");
			} catch (Exception e) {
				e.printStackTrace();
			}
		} else if (selectedBrowser.equalsIgnoreCase(Constants.BROWSER_OPERA)) {
			log.info("-------------***LAUNCHING OPERA***--------------");
			try {

				capabilities = new DesiredCapabilities();
				capabilities.setBrowserName("opera");
				capabilities.setCapability("opera.autostart ", true);

				System.out.println("-----------checking the OPERA-------");
			} catch (Exception e) {
				e.printStackTrace();
			}

		} else if (selectedBrowser.equalsIgnoreCase(Constants.BROWSER_SAFARI)) {
			log.info("-------------***LAUNCHING SAFARI***--------------");
			try {

				capabilities = new DesiredCapabilities();
				capabilities.setBrowserName("safari");
				capabilities.setCapability("safari.autostart ", true);
				System.out.println("-----------checking the SAFARI-------");
			} catch (Exception e) {
				e.printStackTrace();
			}

		} else if (selectedBrowser.equalsIgnoreCase(Constants.BROWSER_FIREFOX)) {
			log.info("-------------***LAUNCHING FIREFOX***--------------");
			capabilities = new DesiredCapabilities();
			capabilities.setBrowserName("firefox");
			System.out.println("-----------checking the firefox-------");
			// break;
			// driver = new RemoteWebDriver(server, capabilities);

		} else {
			throw new ScreenException(
					"------Only FireFox,InternetExplore and Chrome works-----------");
		}

		/**
		 * These 3 steps common for all the browsers
		 */

		/* for(int i=0;i<platform.length;i++) */

		if (selectedPlatform.equalsIgnoreCase("WINDOWS")) {
			capabilities.setCapability(CapabilityType.PLATFORM,
					Platform.WINDOWS);
			// break;
		} else if (selectedPlatform.equalsIgnoreCase("LINUX")) {
			capabilities.setCapability(CapabilityType.PLATFORM, Platform.LINUX);
			// break;
		} else if (selectedPlatform.equalsIgnoreCase("MAC")) {
			capabilities.setCapability(CapabilityType.PLATFORM, Platform.MAC);
			// break;
		}
		driver = new RemoteWebDriver(server, capabilities);
		driver.get(applicationURL + applicationContext);
		// driver.manage().window().maximize();
		// driver.manage().timeouts().implicitlyWait(20, TimeUnit.SECONDS);

	}

	public void closeBrowser() {
		log.info("-------------***BROWSER CLOSING***--------------");
		if (driver != null) {

			driver.quit();
		}
		if (chromeService != null) {
			chromeService.stop();
		}
	}

	public String getChromeLocation() {

		log.info("getChromeLocation:*****CHROME TARGET LOCATION FOUND***");
		String directory = System.getProperty("user.dir");
		String targetDirectory = getChromeFile();
		String location = directory + targetDirectory;
		return location;
	}

	public String getChromeFile() {
		if (System.getProperty("os.name").startsWith(Constants.WINDOWS_OS)) {
			log.info("*******WINDOWS MACHINE FOUND*************");

			return Constants.WINDOWS_DIRECTORY + "/chromedriver.exe";
		} else if (System.getProperty("os.name").startsWith(Constants.LINUX_OS)) {
			log.info("*******LINUX MACHINE FOUND*************");
			return Constants.LINUX_DIRECTORY_64 + "/chromedriver";
		} else if (System.getProperty("os.name").startsWith(Constants.MAC_OS)) {
			log.info("*******MAC MACHINE FOUND*************");
			return Constants.MAC_DIRECTORY + "/chromedriver";
		} else {
			throw new NullPointerException("******PLATFORM NOT FOUND********");
		}

	}

	public WebElement getXpathWebElement(String xpath) throws Exception {
		log.info("Entering:-----getXpathWebElement-------");
		try {

			element = driver.findElement(By.xpath(xpath));

		} catch (Throwable t) {
			log.info("Entering:---------Exception in getXpathWebElement()-----------");
			t.printStackTrace();

		}
		return element;
	}

	public void getIdWebElement(String id) throws ScreenException {
		log.info("Entering:---getIdWebElement-----");
		try {
			element = driver.findElement(By.id(id));

		} catch (Throwable t) {
			log.info("Entering:---------Exception in getIdWebElement()----------");
			t.printStackTrace();

		}

	}

	public void getcssWebElement(String selector) throws ScreenException {
		log.info("Entering:----------getIdWebElement----------");
		try {
			element = driver.findElement(By.cssSelector(selector));

		} catch (Throwable t) {
			log.info("Entering:---------Exception in getIdWebElement()--------");

			t.printStackTrace();

		}

	}

	public void waitForElementPresent(String locator, String methodName)
			throws IOException, Exception {
		try {
			log.info("Entering:--------waitForElementPresent()--------");
			By by = By.xpath(locator);
			WebDriverWait wait = new WebDriverWait(driver, 3);
			log.info("Waiting:--------One second----------");
			wait.until(presenceOfElementLocated(by));
		}

		catch (Exception e) {
			log.info("presenceOfElementLocated" + e.getMessage());

			WebDriver augmentedDriver = new Augmenter().augment(driver);
			File screenshot = ((TakesScreenshot) augmentedDriver)
					.getScreenshotAs(OutputType.FILE);

			try {

				FileUtils.copyFile(screenshot,
						new File(GetCurrentDir.getCurrentDirectory() + "\\"
								+ methodName + ".png"));
			} catch (Exception e1) {
				log.info("presenceOfElementLocated" + e1.getMessage());
			}
			Assert.assertNull(e);

		}
	}

	Function<WebDriver, WebElement> presenceOfElementLocated(final By locator) {
		log.info("Entering:------presenceOfElementLocated()-----Start");
		return new Function<WebDriver, WebElement>() {
			public WebElement apply(WebDriver driver) {
				log.info("Entering:*********presenceOfElementLocated()******End");
				return driver.findElement(locator);

			}

		};

	}

	public void RegisterCheck(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:********Registration Check******");
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getSignUpLink(), methodName);
		getXpathWebElement(this.uiConstants.getSignUpLink());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getUserName(), methodName);
		getXpathWebElement(this.uiConstants.getUserName());
		sendKeys(userInfo.getUserNameValue());
		waitForElementPresent(this.uiConstants.getEmailField(), methodName);
		getXpathWebElement(this.uiConstants.getEmailField());
		click();
		sendKeys(userInfo.getEmailValue());
		Thread.sleep(2000);
		waitForElementPresent(this.uiConstants.getPassWord(), methodName);
		getXpathWebElement(this.uiConstants.getPassWord());
		sendKeys(userInfo.getPasswordValue());
		waitForElementPresent(this.uiConstants.getConfirmPassword(), methodName);
		getXpathWebElement(this.uiConstants.getConfirmPassword());
		click();
		sendKeys(userInfo.getConfirmPassWord());
		Thread.sleep(2000);
		getXpathWebElement(this.uiConstants.getSubmitButton());
		click();
		Thread.sleep(15000);
		logOff(methodName);

	}

	public void RequestNewPassword(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******RequestNewPassword********");

		getXpathWebElement(uiConstants.getLogin());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getRequestLink(), methodName);
		getXpathWebElement(this.uiConstants.getRequestLink());
		click();
		Thread.sleep(2000);
		waitForElementPresent(this.uiConstants.getEmailTextField(), methodName);
		getXpathWebElement(this.uiConstants.getEmailTextField());
		click();
		sendKeys(userInfo.getEmailValue());
		Thread.sleep(2000);
		getXpathWebElement(this.uiConstants.getRequestButton());
		click();
		Thread.sleep(5000);

	}

	public void billInfo(String methodName, DrupalEshopData drupalData)
			throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;

		}
		log.info("Entering:******Category Select*********");
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getLogin(), methodName);
		getXpathWebElement(uiConstants.getLogin());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getUserName(), methodName);
		getXpathWebElement(this.uiConstants.getUserName());
		click();
		sendKeys(userInfo.getUserNameValue());
		waitForElementPresent(this.uiConstants.getPassWordLogin(), methodName);
		getXpathWebElement(this.uiConstants.getPassWordLogin()).click();
		sendKeys(userInfo.getPasswordLoginValue());
		waitForElementPresent(this.uiConstants.getSubmitButton(), methodName);
		getXpathWebElement(this.uiConstants.getSubmitButton());
		click();
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getMovieAndMusics(), methodName);
		getXpathWebElement(uiConstants.getMovieAndMusics());
		click();
		getXpathWebElement(uiConstants.getAddtoCart6());
		click();
		waitForElementPresent("//input[@id='edit-checkout']", methodName);
		getXpathWebElement("//input[@id='edit-checkout']");
		click();
		Thread.sleep(5000);

	}

	public void billInfo1(String methodName, DrupalEshopData drupalData)
			throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;

		}

		Thread.sleep(3000);
		waitForElementPresent(uiConstants.getLogin(), methodName);
		getXpathWebElement(uiConstants.getLogin());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getUserName(), methodName);
		getXpathWebElement(this.uiConstants.getUserName());
		click();
		sendKeys(userInfo.getUserNameValue());
		waitForElementPresent(this.uiConstants.getPassWordLogin(), methodName);
		getXpathWebElement(this.uiConstants.getPassWordLogin()).click();
		sendKeys(userInfo.getPasswordLoginValue());
		waitForElementPresent(this.uiConstants.getSubmitButton(), methodName);
		getXpathWebElement(this.uiConstants.getSubmitButton());
		click();
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getMp3Player(), methodName);
		getXpathWebElement(uiConstants.getMp3Player());
		click();
		getXpathWebElement(uiConstants.getAddtoCart7());
		click();
		waitForElementPresent(this.uiConstants.getCheckOutBtn(), methodName);
		getXpathWebElement(this.uiConstants.getCheckOutBtn());
		click();
		Thread.sleep(5000);

	}

	public void checkoutCategory(String methodName, DrupalEshopData drupalData)
			throws Exception {

		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******Checkout Category*********");

		Thread.sleep(3000);
		waitForElementPresent(this.uiConstants.getFirstName(), methodName);
		getXpathWebElement(this.uiConstants.getFirstName());
		sendKeys(drupalData.getFirstnamevalue());
		waitForElementPresent(this.uiConstants.getLastName(), methodName);
		getXpathWebElement(this.uiConstants.getLastName());
		sendKeys(drupalData.getLastnamevalue());
		waitForElementPresent(this.uiConstants.getCompany(), methodName);
		getXpathWebElement(this.uiConstants.getCompany());
		sendKeys(drupalData.getCompanyvalue());
		waitForElementPresent(this.uiConstants.getStreetAddress1(), methodName);
		getXpathWebElement(this.uiConstants.getStreetAddress1());
		sendKeys(drupalData.getStreetaddress1());
		waitForElementPresent(this.uiConstants.getStreetAddress2(), methodName);
		getXpathWebElement(this.uiConstants.getStreetAddress2());
		sendKeys(drupalData.getStreetaddress2());
		waitForElementPresent(this.uiConstants.getCity(), methodName);
		getXpathWebElement(this.uiConstants.getCity());
		sendKeys(drupalData.getCityvalue());
		Thread.sleep(2000);
		waitForElementPresent(this.uiConstants.getBillInfoStateXpath(),
				methodName);
		getXpathWebElement(this.uiConstants.getBillInfoStateXpath());
		sendKeys(drupalData.getStatevalue());
		Thread.sleep(2000);
		waitForElementPresent(this.uiConstants.getPostelCode(), methodName);
		getXpathWebElement(this.uiConstants.getPostelCode());
		sendKeys(drupalData.getPostelcodecvalue());

		Thread.sleep(2000);
		waitForElementPresent(this.uiConstants.getBillInfoCheckBox(),
				methodName);
		getXpathWebElement(this.uiConstants.getBillInfoCheckBox());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getOrderComm(), methodName);
		getXpathWebElement(this.uiConstants.getOrderComm());
		sendKeys(drupalData.getOrdercommvalue());
		getXpathWebElement(this.uiConstants.getReviewOrder());
		click();
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getCheckOutSubmit(), methodName);
		getXpathWebElement(this.uiConstants.getCheckOutSubmit());
		click();
		Thread.sleep(10000);
		getXpathWebElement(this.uiConstants.getLogoButton());
		click();
		Thread.sleep(10000);

	}

	public void homeSpecialTab(String methodName) throws Exception {

		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******Special Tab*********");
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getHome(), methodName);
		getXpathWebElement(this.uiConstants.getHome());
		click();
		Thread.sleep(5000);

	}

	public void homeShoppingCart(String methodName) throws Exception {

		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******Shopping Cart*********");
		Thread.sleep(7000);
		waitForElementPresent(this.uiConstants.getShopping(), methodName);
		getXpathWebElement(this.uiConstants.getShopping());
		click();
		Thread.sleep(5000);

	}

	public void aboutUs(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******About Us*********");
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getAboutus(), methodName);
		waitForElementPresent(uiConstants.getAboutus(), methodName);
		getXpathWebElement(uiConstants.getAboutus());
		click();
		Thread.sleep(5000);

	}

	public void contactUs(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******Contact US*********");
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getContactus(), methodName);
		getXpathWebElement(uiConstants.getContactus());
		click();
		Thread.sleep(5000);
	}

	public void searchProducts(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******Search Products*********");
		Thread.sleep(5000);
		waitForElementPresent(this.uiConstants.getSearchProducts(), methodName);
		getXpathWebElement(this.uiConstants.getSearchProducts());
		sendKeys(commondrupalConstants.getSearchProducts());
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.getSearch(), methodName);
		getXpathWebElement(uiConstants.getSearch());
		click();
		Thread.sleep(5000);
	}

	public void logOff(String methodName) throws Exception {

		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		}
		log.info("Entering:******LogOff*********");
		Thread.sleep(7000);
		getXpathWebElement(this.uiConstants.getLogoButton());
		click();
		Thread.sleep(10000);
	}

	/*
	 * public void scrollDownUP() { try{
	 * driver.findElement(By.id("© Photon Infotech 2012")).sendKeys(Keys.END);
	 * Thread.sleep(5000);
	 * driver.findElement(By.id("© Photon Infotech 2012")).sendKeys(Keys.UP);
	 * }catch (Throwable t) { t.printStackTrace(); }
	 * 
	 * }
	 */

	public void selectValue(String valToBeSelected) {
		List<WebElement> options = driver.findElements(By.tagName("option"));
		for (WebElement option : options) {
			if (valToBeSelected.equalsIgnoreCase(option.getText())) {
				option.click();
			}
		}
	}

	public void click() throws ScreenException {
		log.info("Entering:********click operation start********");
		try {
			element.click();
		} catch (Throwable t) {
			t.printStackTrace();
		}
		log.info("Entering:********click operation end********");

	}

	public void clear() throws ScreenException {
		log.info("Entering:********clear operation start********");
		try {
			element.clear();
		} catch (Throwable t) {
			t.printStackTrace();
		}
		log.info("Entering:********clear operation end********");

	}

	public void sendKeys(String text) throws ScreenException {
		log.info("Entering:********enterText operation start********");
		try {
			clear();
			element.sendKeys(text);

		} catch (Throwable t) {
			t.printStackTrace();
		}
		log.info("Entering:********enterText operation end********");
	}

	public void submit() throws ScreenException {
		log.info("Entering:********submit operation start********");
		try {
			element.submit();
		} catch (Throwable t) {
			t.printStackTrace();
		}
		log.info("Entering:********submit operation end********");

	}

	/*
	 * public void isTextPresent(String textValue) {
	 * 
	 * if (textValue != null) { Boolean textCheck =
	 * driver.getPageSource().contains(textValue);
	 * 
	 * System.out.println("-----TextCheck value-->"+textCheck);
	 * //Assert.assertTrue(textCheck); Assert.assertTrue("Text present",
	 * textCheck); } else {
	 * 
	 * throw new RuntimeException("---- Text not existed----");
	 * 
	 * } }
	 */

	public void isElementPresent(String element) throws Exception {

		WebElement testElement = getXpathWebElement(element);
		if (testElement.isDisplayed() && testElement.isEnabled()) {

			log.info("---Element found---");
		} else {
			throw new RuntimeException("--Element not found---");
			// Assert.fail("--Element is not present--"+testElement);

		}

	}

	/**
	 * 
	 * @param text
	 */
	public void isTextPresent(String text) {
		if (text != null) {
			boolean value = driver.findElement(By.tagName("body")).getText()
					.contains(text);
			Assert.assertTrue(value);

		} else {
			throw new RuntimeException("---- Text not existed----");
		}

	}

}
