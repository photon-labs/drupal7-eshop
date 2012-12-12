package com.photon.phresco.Screens;

import java.io.IOException;


import com.photon.phresco.uiconstants.DrupalData;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class PhotonAbstractScreen extends BaseScreen {


	public PhotonAbstractScreen(){
	
	}
	
	/**
	 * Invoking the super class method through passing the vale of Browser,URL, Context, then PhpData,UIConstants,UserInfoConstants Xml Values
	 * @throws InterruptedException
	 * @throws IOException
	 * @throws Exception
	 */

	protected PhotonAbstractScreen(String selectedBrowser,String selectedPlatform,String applicationURL,String applicationContext,DrupalData drupalConstants,UIConstants uiConstants,UserInfoConstants userInfo) throws IOException,
			Exception {
		super(selectedBrowser,selectedPlatform, applicationURL,applicationContext,drupalConstants,uiConstants,userInfo);

	

}
}