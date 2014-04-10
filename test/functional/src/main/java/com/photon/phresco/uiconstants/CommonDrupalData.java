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
package com.photon.phresco.uiconstants;

import java.lang.reflect.Field;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class CommonDrupalData {

	private Log log = LogFactory.getLog("DrupalData");

	public String textRegistration = "textregistration";
	public String textRequestNewPwd = "textrequestnewpwd";
	public String textLogin = "textlogin";
	public String textAccessories = "textaccessories";
	public String textUpdate = "textupdate";
	public String quantity1Value = "quantity1value";
	public String textAudiodevices = "textaudiodevices";
	public String textCameras = "textcameras";
	public String textComputers = "textcomputers";
	public String textMobilephones = "textmobilephones";
	public String textRemove = "textremove";

	public String textMovies = "textmovies";
	public String textMp3 = "textmp3";
	public String textTablets = "texttablets";
	public String textTelevision = "texttelevision";
	public String textVideogames = "textvideogames";
	public String textOrder = "textorder";
	public String textHomeSelect = "texthomeselect";
	public String textContactus = "textcontactus";
	public String textContactus1 = "textcontactus1";
	public String aboutusvalue = "aboutusvalue";
	public String searchProducts = "searchproducts";

	/**
	 * Reading the input values from Xml environment through DrupalData
	 * Constructor
	 */
	public CommonDrupalData() {
		try {
			ReadXMLFile readXml = new ReadXMLFile();
			readXml.loaddrupalData();
			Field[] arrayOfField = this.getClass().getDeclaredFields();
			for (Field field : arrayOfField) {
				field.setAccessible(true);
				Object localObject = field.get(this);
				if (localObject instanceof String) {
					field.set(this, readXml.getValue((String) localObject));
				}
			}
		} catch (Exception localException) {
			log.info("Exception in DrupalData" + localException.getMessage());
		}
	}

	public String getTextRegistration() {
		return textRegistration;
	}

	public void setTextRegistration(String textRegistration) {
		this.textRegistration = textRegistration;
	}

	public String getTextRequestNewPwd() {
		return textRequestNewPwd;
	}

	public void setTextRequestNewPwd(String textRequestNewPwd) {
		this.textRequestNewPwd = textRequestNewPwd;
	}

	public String getTextLogin() {
		return textLogin;
	}

	public void setTextLogin(String textLogin) {
		this.textLogin = textLogin;
	}

	public String getTextAccessories() {
		return textAccessories;
	}

	public void setTextAccessories(String textAccessories) {
		this.textAccessories = textAccessories;
	}

	public String getTextUpdate() {
		return textUpdate;
	}

	public void setTextUpdate(String textUpdate) {
		this.textUpdate = textUpdate;
	}

	public String getQuantity1Value() {
		return quantity1Value;
	}

	public void setQuantity1Value(String quantity1Value) {
		this.quantity1Value = quantity1Value;
	}

	public String getTextAudiodevices() {
		return textAudiodevices;
	}

	public void setTextAudiodevices(String textAudiodevices) {
		this.textAudiodevices = textAudiodevices;
	}

	public String getTextCameras() {
		return textCameras;
	}

	public void setTextCameras(String textCameras) {
		this.textCameras = textCameras;
	}

	public String getTextComputers() {
		return textComputers;
	}

	public void setTextComputers(String textComputers) {
		this.textComputers = textComputers;
	}

	public String getTextMobilephones() {
		return textMobilephones;
	}

	public void setTextMobilephones(String textMobilephones) {
		this.textMobilephones = textMobilephones;
	}

	public String getTextRemove() {
		return textRemove;
	}

	public void setTextRemove(String textRemove) {
		this.textRemove = textRemove;
	}

	public String getTextMovies() {
		return textMovies;
	}

	public void setTextMovies(String textMovies) {
		this.textMovies = textMovies;
	}

	public String getTextMp3() {
		return textMp3;
	}

	public void setTextMp3(String textMp3) {
		this.textMp3 = textMp3;
	}

	public String getTextTablets() {
		return textTablets;
	}

	public void setTextTablets(String textTablets) {
		this.textTablets = textTablets;
	}

	public String getTextTelevision() {
		return textTelevision;
	}

	public void setTextTelevision(String textTelevision) {
		this.textTelevision = textTelevision;
	}

	public String getTextVideogames() {
		return textVideogames;
	}

	public void setTextVideogames(String textVideogames) {
		this.textVideogames = textVideogames;
	}

	public String getTextOrder() {
		return textOrder;
	}

	public void setTextOrder(String textOrder) {
		this.textOrder = textOrder;
	}

	public String getTextHomeSelect() {
		return textHomeSelect;
	}

	public void setTextHomeSelect(String textHomeSelect) {
		this.textHomeSelect = textHomeSelect;
	}

	public String getTextContactus() {
		return textContactus;
	}

	public void setTextContactus(String textContactus) {
		this.textContactus = textContactus;
	}

	public String getTextContactus1() {
		return textContactus1;
	}

	public void setTextContactus1(String textContactus1) {
		this.textContactus1 = textContactus1;
	}

	public String getAboutusvalue() {
		return aboutusvalue;
	}

	public void setAboutusvalue(String aboutusvalue) {
		this.aboutusvalue = aboutusvalue;
	}

	public String getSearchProducts() {
		return searchProducts;
	}

	public void setSearchProducts(String searchProducts) {
		this.searchProducts = searchProducts;
	}

}
