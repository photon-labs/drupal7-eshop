package com.photon.phresco.Screens;

import java.awt.AWTException;
import java.awt.Robot;
import java.awt.event.KeyEvent;
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
import org.openqa.selenium.Dimension;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.Platform;
import org.openqa.selenium.TakesScreenshot;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeDriverService;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.ie.InternetExplorerDriver;
import org.openqa.selenium.remote.CapabilityType;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.testng.Assert;

import com.google.common.base.Function;
import com.photon.phresco.selenium.util.Constants;
import com.photon.phresco.selenium.util.GetCurrentDir;
import com.photon.phresco.selenium.util.ScreenActionFailedException;
import com.photon.phresco.selenium.util.ScreenException;
import com.photon.phresco.uiconstants.DrupalData;
import com.photon.phresco.uiconstants.PhrescoUiConstants;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;



public class BaseScreen {

	private WebDriver driver;
	private ChromeDriverService chromeService;
	private  Log log = LogFactory.getLog("BaseScreen");
	private WebElement element;
	private DrupalData drupalConstants;
	private UIConstants uiConstants;
	private UserInfoConstants userInfo;
	private  PhrescoUiConstants phrsc;
	DesiredCapabilities capabilities;
	


	public BaseScreen() {

	}
	
	/**
	 * Invoking the super class method through passing the vale of Browser,URL, Context, then PhpData,UIConstants,UserInfoConstants Xml Values
	 * Then triggering instantiateBrowser
	 * @throws ScreenException
	 */
	public BaseScreen(String selectedBrowser,String selectedPlatform, String applicationURL,
			String applicationContext, DrupalData drupalConstants,
			UIConstants uiConstants, UserInfoConstants userInfo) throws AWTException, IOException, ScreenActionFailedException {

		this.drupalConstants = drupalConstants;
		this.uiConstants = uiConstants;
		this.userInfo=userInfo;
		try {
			instantiateBrowser(selectedBrowser,selectedPlatform, applicationURL, applicationContext);
		} catch (ScreenException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public void instantiateBrowser(String selectedBrowser,String selectedPlatform,
			String applicationURL, String applicationContext)
					 throws ScreenException,
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
			driver = new InternetExplorerDriver();
			capabilities = new DesiredCapabilities();
			capabilities.setBrowserName("iexplore");
			// break;
			// capabilities.setPlatform(selectedPlatform);

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
	
	public  void windowResize()
	{
		phrsc = new PhrescoUiConstants();
		String resolution = phrsc.RESOLUTION;		
		if(resolution!=null)
		{
		String[] tokens = resolution.split("x");
		String resolutionX=tokens[0];
		String resolutionY=tokens[1];		
		int x= Integer.parseInt(resolutionX);
		int y= Integer.parseInt(resolutionY);
		Dimension screenResolution = new Dimension(x,y);
		driver.manage().window().setSize(screenResolution);
		}
		else{
			driver.manage().window().maximize();
		}
	}

	/*
	 * public static void windowMaximizeFirefox() {
	 * driver.manage().window().setPosition(new Point(0, 0)); java.awt.Dimension
	 * screenSize = java.awt.Toolkit.getDefaultToolkit() .getScreenSize();
	 * Dimension dim = new Dimension((int) screenSize.getWidth(), (int)
	 * screenSize.getHeight()); driver.manage().window().setSize(dim); }
	 */

	public void closeBrowser() {
		log.info("-------------***BROWSER CLOSING***--------------");
		if (driver != null) {

			driver.quit();
		}
		if (chromeService != null) {
			chromeService.stop();
		}
	}

	public  String getChromeLocation() {

		log.info("getChromeLocation:*****CHROME TARGET LOCATION FOUND***");
		String directory = System.getProperty("user.dir");
		String targetDirectory = getChromeFile();
		String location = directory + targetDirectory;
		return location;
	}

	public  String getChromeFile() {
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
			/*File scrFile = ((TakesScreenshot) driver)
					.getScreenshotAs(OutputType.FILE);
			FileUtils.copyFile(scrFile,
					new File(GetCurrentDir.getCurrentDirectory() + "\\"
							+ methodName + ".png"));
			//throw new RuntimeException("waitForElementPresent"
					//	+ super.getClass().getSimpleName() + " failed", e);
*/			Assert.assertNull(e);

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
			
			    waitForElementPresent(this.uiConstants.SIGNUPLINK,methodName);
			    element=getXpathWebElement(this.uiConstants.SIGNUPLINK);
			    click();
			    Thread.sleep(3000);
			    waitForElementPresent(this.uiConstants.USERNAME, methodName);
			    getXpathWebElement(this.uiConstants.USERNAME);
			    element.sendKeys(userInfo.USERNAME_VALUE);			    
			    waitForElementPresent(this.uiConstants.EMAILFILED,methodName);
			    getXpathWebElement(this.uiConstants.EMAILFILED);
			    click();
			    sendKeys(userInfo.EMAIL_VALUE);
			    Thread.sleep(2000);
			    waitForElementPresent(this.uiConstants.PASSWORD, methodName);
			    getXpathWebElement(this.uiConstants.PASSWORD);
			    element.sendKeys(userInfo.PASSWORD_VALUE);
			    waitForElementPresent(this.uiConstants.CONFIRMPASSWORD,methodName);
			    getXpathWebElement(this.uiConstants.CONFIRMPASSWORD);
			    click();
			    sendKeys(userInfo.CONFIRM_PASSWORD);
			    Thread.sleep(2000);
			    element=getXpathWebElement(this.uiConstants.SUBMITBUTTON);
			    click();
			    Thread.sleep(3000);			    
	            waitForElementPresent(drupalConstants.TEXTREGISTRATION,methodName);
			    isTextPresent(drupalConstants.TEXTREGISTRATION);
			    Thread.sleep(3000);
			    element=getXpathWebElement(this.uiConstants.LOGOFFBUTTON);
			    click();
	}
	
	
	
	public void loginDrupal(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		
        
		} 
		log.info("Entering:******Login Account******");
		
		element=getXpathWebElement(uiConstants.LOGIN);
		element.click();
		waitForElementPresent(this.uiConstants.USERNAME, methodName);
		getXpathWebElement(this.uiConstants.USERNAME);
		element.sendKeys(userInfo.USERNAME_VALUE);			    
		waitForElementPresent(this.uiConstants.PASSWORDLOGIN, methodName);
		getXpathWebElement(this.uiConstants.PASSWORDLOGIN).click();
		element.sendKeys(userInfo.PASSWORDLOGIN_VALUE);
		element=getXpathWebElement(this.uiConstants.SUBMITBUTTON);
		element.click();
		isTextPresent(drupalConstants.TEXTLOGINN);
		element=getXpathWebElement(uiConstants.LOGOFFBUTTON);
		element.click();
		
		
	}
	
	
	public void RequestNewPassword(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		  }
		    log.info("Entering:******RequestNewPassword********");
		    
		    element=getXpathWebElement(uiConstants.LOGIN);
			element.click();
		    waitForElementPresent(this.uiConstants.REQUESTLINK,methodName);
		    getXpathWebElement(this.uiConstants.REQUESTLINK);
		    click();
		    Thread.sleep(2000);
		    waitForElementPresent(this.uiConstants.EMAILTEXTFIELD,methodName);
		    getXpathWebElement(this.uiConstants.EMAILTEXTFIELD);
		    click();
		    sendKeys(userInfo.EMAIL_VALUE);
		    Thread.sleep(2000);
		    element=getXpathWebElement(this.uiConstants.REQUESTBUTTON);
		    click();
		    Thread.sleep(5000);
		    isTextPresent(drupalConstants.TEXTREQUESTNEWPWD);
		    
		    
	}
	
	

	
	public void categorySelect(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		
        
		} 
		log.info("Entering:******Category Select*********");
		
		element=getXpathWebElement(uiConstants.LOGIN);
		element.click();
		waitForElementPresent(this.uiConstants.USERNAME, methodName);
		getXpathWebElement(this.uiConstants.USERNAME);
		element.sendKeys(userInfo.USERNAME_VALUE);			    
		waitForElementPresent(this.uiConstants.PASSWORDLOGIN, methodName);
		getXpathWebElement(this.uiConstants.PASSWORDLOGIN).click();
		element.sendKeys(userInfo.PASSWORDLOGIN_VALUE);
		element=getXpathWebElement(this.uiConstants.SUBMITBUTTON);
		element.click();			
	    element=getXpathWebElement(this.uiConstants.ACCESSORIES);
	    element.click();	    
	    element=getXpathWebElement(this.uiConstants.ADDTOCART1);
	    element.click();
	    isTextPresent(drupalConstants.TEXTACCESSORIES);
	    waitForElementPresent(this.uiConstants.QUANTITY1, methodName);
	    getXpathWebElement(this.uiConstants.QUANTITY1);
	    clear();
	    element.sendKeys(drupalConstants.QUANTITY1_VALUE);
	    element=getXpathWebElement(this.uiConstants.UPDATECART1);
	    element.click();
	    isTextPresent(drupalConstants.TEXTUPDATE);	    
	    element=getXpathWebElement(this.uiConstants.AUDIODEVICE);
	    element.click();
	    element=getXpathWebElement(this.uiConstants.ADDTOCART2);
	    element.click();
	    isTextPresent(drupalConstants.TEXTAUDIODEVICES);
	    element=getXpathWebElement(this.uiConstants.UPDATECART2);
	    element.click();
	    isTextPresent(drupalConstants.TEXTUPDATE);  
	    element=getXpathWebElement(this.uiConstants.CAMERAS);
	    element.click();
	    element=getXpathWebElement(this.uiConstants.ADDTOCART3);
	    element.click();
	    isTextPresent(drupalConstants.TEXTCAMERAS);
	    element=getXpathWebElement(this.uiConstants.UPDATECART3);
	    element.click();
	    isTextPresent(drupalConstants.TEXTUPDATE);
	    element=getXpathWebElement(this.uiConstants.COMPUTERS);
	    element.click();
	    element=getXpathWebElement(this.uiConstants.ADDTOCART4);
	    element.click();
	    isTextPresent(drupalConstants.TEXTCOMPUTERS);
	    element=getXpathWebElement(this.uiConstants.UPDATECART4);
	    element.click();
	    isTextPresent(drupalConstants.TEXTUPDATE); 
	    element=getXpathWebElement(this.uiConstants.MOBILEPHONES);
	    element.click();
	    element=getXpathWebElement(this.uiConstants.ADDTOCART5);
	    element.click();
	    isTextPresent(drupalConstants.TEXTMOBILEPHONES);
	    element=getXpathWebElement(this.uiConstants.REMOVE);
	    element.click();
	    isTextPresent(drupalConstants.TEXTREMOVE);
	    element=getXpathWebElement(this.uiConstants.REMOVE1);
	    element.click();
	    isTextPresent(drupalConstants.TEXTREMOVE);
	    element=getXpathWebElement(this.uiConstants.UPDATECART5);
	    element.click();
	    isTextPresent(drupalConstants.TEXTUPDATE);
	    

	    
	}
	
	public void CategorySelectLast(String methodName) throws Exception {
		if (StringUtils.isEmpty(methodName)) {
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			;
		
        
		} 
		log.info("Entering:******Category SelectLast*********");
		
		waitForElementPresent(uiConstants.MOVIEANDMUSIC,methodName);
   	 	getXpathWebElement(uiConstants.MOVIEANDMUSIC);
		element.click();
		getXpathWebElement(uiConstants.ADDTOCART6);
		element.click();	
		isTextPresent(drupalConstants.TEXTMOVIES);
		waitForElementPresent(uiConstants.MP3PLAYER,methodName);
    	getXpathWebElement(uiConstants.MP3PLAYER);
		element.click();
    	getXpathWebElement(uiConstants.ADDTOCART7);
		element.click();
		isTextPresent(drupalConstants.TEXTMP3);
		waitForElementPresent(uiConstants.TABLETS,methodName);
   	 	getXpathWebElement(uiConstants.TABLETS);
		element.click();
		Thread.sleep(5000);
   	 	getXpathWebElement(uiConstants.ADDTOCART8);
		element.click();
		isTextPresent(drupalConstants.TEXTTABLETS);
		Thread.sleep(5000);
		waitForElementPresent(uiConstants.TELEVISION,methodName);
    	getXpathWebElement(uiConstants.TELEVISION);
		element.click();
		Thread.sleep(5000);
    	getXpathWebElement(uiConstants.ADDTOCART9);
		element.click();
		isTextPresent(drupalConstants.TEXTTELEVISION);
		getXpathWebElement(uiConstants.UPDATECART1);
		element.click();
		isTextPresent(drupalConstants.TEXTUPDATE);
		waitForElementPresent(uiConstants.VIDEOGAMES,methodName);
    	getXpathWebElement(uiConstants.VIDEOGAMES);
		element.click();
    	getXpathWebElement(uiConstants.ADDTOCART10);
		element.click();
		isTextPresent(drupalConstants.TEXTVIDEOGAMES);
		element=getXpathWebElement(this.uiConstants.CHECKOUT);
	    element.click();
	    Thread.sleep(5000);
	    
		
	}
	    
	    public void checkoutCategory(String methodName) throws Exception {

			if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1]
						.getMethodName();
				;
			}
			log.info("Entering:******Checkout Category*********");
			
			element=getXpathWebElement(this.uiConstants.BILLINGADDCHECK);
		    element.click();
		    Thread.sleep(8000);
			waitForElementPresent(this.uiConstants.FIRSTNAME, methodName);
		    getXpathWebElement(this.uiConstants.FIRSTNAME);
		    element.sendKeys(drupalConstants.FIRSTNAME_VALUE);
		    waitForElementPresent(this.uiConstants.LASTNAME, methodName);
		    getXpathWebElement(this.uiConstants.LASTNAME);
		    element.sendKeys(drupalConstants.LASTNAME_VALUE);
		    waitForElementPresent(this.uiConstants.COMPANY, methodName);
		    getXpathWebElement(this.uiConstants.COMPANY);
		    element.sendKeys(drupalConstants.COMPANY_VALUE);
		    waitForElementPresent(this.uiConstants.STREETADDRESS1, methodName);
		    getXpathWebElement(this.uiConstants.STREETADDRESS1);
		    element.sendKeys(drupalConstants.STRRETADDRESS1_VALUE);
		    waitForElementPresent(this.uiConstants.STREETADDRESS2, methodName);
		    getXpathWebElement(this.uiConstants.STREETADDRESS2);
		    element.sendKeys(drupalConstants.STREETADDRESS2_VALUE);
		    waitForElementPresent(this.uiConstants.CITY, methodName);
		    getXpathWebElement(this.uiConstants.CITY);
		    element.sendKeys(drupalConstants.CITY_VALUE);
		    waitForElementPresent(this.uiConstants.POSTELCODE, methodName);
		    getXpathWebElement(this.uiConstants.POSTELCODE);
		    element.sendKeys(drupalConstants.POSTELCODE_VALUE);
		    selectValue(drupalConstants.COUNTRY_VALUE);
		    Thread.sleep(12000);
		    selectValue(drupalConstants.STATE_VALUE);
		    waitForElementPresent(this.uiConstants.ORDERCOMM, methodName);
		    getXpathWebElement(this.uiConstants.ORDERCOMM);
		    element.sendKeys(drupalConstants.ORDERCOMM_VALUE);
		    element=getXpathWebElement(this.uiConstants.REVIEWORDER);
		    element.click();
		    element=getXpathWebElement(this.uiConstants.CHECKOUTSUBMIT);
		    element.click();
		    Thread.sleep(5000);
		    isTextPresent(drupalConstants.TEXTORDER);
		  
			
			
	    }
	    
	    public void homeSpecialTab(String methodName) throws Exception {

			if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1]
						.getMethodName();
				;
			}
			log.info("Entering:******Special Tab*********");
			
			element=getXpathWebElement(this.uiConstants.HOME);
		    element.click();
		    element=getXpathWebElement(this.uiConstants.NEXT);
		    element.click();
		    element=getXpathWebElement(this.uiConstants.NEXT);
		    element.click();
		    element=getXpathWebElement(this.uiConstants.SELECT);
		    element.click();
		    isTextPresent(drupalConstants.TEXTHOMESELECT);
		    element=getXpathWebElement(this.uiConstants.UPDATESELECT);
		    element.click();
		    isTextPresent(drupalConstants.TEXTUPDATE);
	
			
			
	    }
	    
	    public void homeShoppingCart(String methodName) throws Exception {

			if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1]
						.getMethodName();
				;
			}
			log.info("Entering:******Shopping Cart*********");
			
			element=getXpathWebElement(this.uiConstants.SHOPPING);
		    element.click();
		    element=getXpathWebElement(this.uiConstants.REMOVECART);
		    element.click();
		    isTextPresent(drupalConstants.TEXTREMOVE);
		    element=getXpathWebElement(this.uiConstants.HOME);
		    element.click();
		    Thread.sleep(5000);
		    /*element=getXpathWebElement(this.uiConstants.LOGOUT);
		    element.click();
			*/
			
			
	    }
	    
	    public  void aboutUs(String methodName)throws Exception {
	    	if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1].getMethodName();;
			}
	    	log.info("Entering:******About Us*********");
	    	
	    	waitForElementPresent(uiConstants.ABOUTUS,methodName);
	    	getXpathWebElement(uiConstants.ABOUTUS);
			element.click();
			Thread.sleep(5000);
			isTextPresent(drupalConstants.ABOUTUS_VALUE);
			Thread.sleep(5000);
	    	
			}
	    
	    public void contactUs(String methodName)throws Exception {
	    	if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1].getMethodName();;
			}
	    	log.info("Entering:******Contact US*********");
	    	
	    	waitForElementPresent(uiConstants.CONTACTUS,methodName);
	    	getXpathWebElement(uiConstants.CONTACTUS);
			element.click();
			Thread.sleep(5000);
			isTextPresent(drupalConstants.TEXTCONTACTUS);
			Thread.sleep(5000);
			isTextPresent(drupalConstants.TEXTCONTACTUS1);
			
	    }
	    
	    public void searchProducts(String methodName)throws Exception {
	    	if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1].getMethodName();;
			}
	    	log.info("Entering:******Search Products*********");
	    	
	    	waitForElementPresent(this.uiConstants.SEARCHPRODUCTS,methodName);
			getXpathWebElement(this.uiConstants.SEARCHPRODUCTS);
			sendKeys(drupalConstants.SEARCHPRODUCTS);
			Thread.sleep(5000);
			waitForElementPresent(uiConstants.SEARCH,methodName);
		    getXpathWebElement(uiConstants.SEARCH);
			element.click();
			Thread.sleep(5000);
	    }
	    
	    
	   
	    public void logOff(String methodName) throws Exception {

			if (StringUtils.isEmpty(methodName)) {
				methodName = Thread.currentThread().getStackTrace()[1]
						.getMethodName();
				;
			}
			log.info("Entering:******LogOff*********");
			
			element=getXpathWebElement(this.uiConstants.LOGOFFBUTTON);
			element.click();
			Thread.sleep(5000);
	    }
	  
	  /*  public void scrollDownUP()
	    {
	    	try{
	    	driver.findElement(By.id("© Photon Infotech 2012")).sendKeys(Keys.END);
	    	Thread.sleep(5000);
	    	driver.findElement(By.id("© Photon Infotech 2012")).sendKeys(Keys.UP);
	    	}catch (Throwable t) {
				t.printStackTrace();
			}

	    }
	    */
	    
	    public void selectValue(String valToBeSelected){
	    	List <WebElement> options = driver.findElements(By.tagName("option"));
			for (WebElement option : options) {
				if (valToBeSelected.equalsIgnoreCase(option.getText())){
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

	/*public void isTextPresent(String textValue) {
		
		if (textValue != null) {
			Boolean textCheck = driver.getPageSource().contains(textValue);
			
			System.out.println("-----TextCheck value-->"+textCheck);
			//Assert.assertTrue(textCheck);
			Assert.assertTrue("Text present", textCheck);
		} else {

			throw new RuntimeException("---- Text not existed----");
			
		}
	}*/

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
		if (text!= null){
		boolean value=driver.findElement(By.tagName("body")).getText().contains(text);	
		Assert.assertTrue(value);   
	    
	    }
		else
		{
			throw new RuntimeException("---- Text not existed----");
		}
	    
	    
	    
	}	
	
	


}

