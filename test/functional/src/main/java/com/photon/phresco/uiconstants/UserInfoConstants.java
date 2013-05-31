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

import java.lang.reflect.Field;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class UserInfoConstants {

	private Log log = LogFactory.getLog("Drupal UserInfoConstants");

	public String userNameValue = "username";
	public String emailValue = "emailvalue";
	public String passwordValue = "password";
	public String confirmPassWord = "cpassWord";
	public String passwordLoginValue = "password";

	/**
	 * Reading the UserInfoConstants xml files through UserInfoConstants()
	 * Constructor
	 */
	public UserInfoConstants() {
		try {
			ReadXMLFile readXml = new ReadXMLFile();
			readXml.loadUserInfoConstants();
			Field[] arrayOfField = this.getClass().getDeclaredFields();
			for (Field field : arrayOfField) {
				field.setAccessible(true);
				Object localObject = field.get(this);
				if (localObject instanceof String) {
					field.set(this, readXml.getValue((String) localObject));
				}
			}
		} catch (Exception localException) {
			log.info("Exception in Drupal UserInfoConstants"
					+ localException.getMessage());
		}
	}

	public String getUserNameValue() {
		return userNameValue;
	}

	public void setUserNameValue(String userNameValue) {
		this.userNameValue = userNameValue;
	}

	public String getEmailValue() {
		return emailValue;
	}

	public void setEmailValue(String emailValue) {
		this.emailValue = emailValue;
	}

	public String getPasswordValue() {
		return passwordValue;
	}

	public void setPasswordValue(String passwordValue) {
		this.passwordValue = passwordValue;
	}

	public String getConfirmPassWord() {
		return confirmPassWord;
	}

	public void setConfirmPassWord(String confirmPassWord) {
		this.confirmPassWord = confirmPassWord;
	}

	public String getPasswordLoginValue() {
		return passwordLoginValue;
	}

	public void setPasswordLoginValue(String passwordLoginValue) {
		this.passwordLoginValue = passwordLoginValue;
	}

}
