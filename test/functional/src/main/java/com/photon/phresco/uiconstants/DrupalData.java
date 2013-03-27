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

public class DrupalData {

	private ReadXMLFile readXml;
		
	public String TEXTREGISTRATION="textregistration";
	public String TEXTREQUESTNEWPWD="textrequestnewpwd";
	public String TEXTLOGINN="textlogin";
	public String TEXTACCESSORIES="textaccessories";
	public String TEXTUPDATE="textupdate";
	public String QUANTITY1_VALUE="quantity1value";
	public String TEXTAUDIODEVICES="textaudiodevices";
	public String TEXTCAMERAS="textcameras";
	public String TEXTCOMPUTERS="textcomputers";
	public String TEXTMOBILEPHONES="textmobilephones";
	public String TEXTREMOVE="textremove";
	public String FIRSTNAME_VALUE="firstnamevalue";
	public String LASTNAME_VALUE="lastnamevalue";
	public String COMPANY_VALUE="companyvalue";
	public String STRRETADDRESS1_VALUE="streetaddress1";
	public String STREETADDRESS2_VALUE="streetaddress2";
	public String CITY_VALUE="cityvalue";
	public String COUNTRY_VALUE="countryvalue";
	public String STATE_VALUE="statevalue";
	public String POSTELCODE_VALUE="postelcodecvalue";
	public String ORDERCOMM_VALUE="ordercommvalue";
	public String TEXTMOVIES="textmovies";
	public String TEXTMP3="textmp3";
	public String TEXTTABLETS="texttablets";
	public String TEXTTELEVISION="texttelevision";
	public String TEXTVIDEOGAMES="textvideogames";
	public String TEXTORDER="textorder";	
	public String TEXTHOMESELECT="texthomeselect";
	public String TEXTCONTACTUS="textcontactus";
	public String TEXTCONTACTUS1="textcontactus1";
	public String ABOUTUS_VALUE="aboutusvalue";
    public String SEARCHPRODUCTS="searchproducts";
    
	


	/**
	 * Reading the input values from Xml environment through DrupalData Constructor
	 */
	public DrupalData() {
		try {
			readXml = new ReadXMLFile();
			readXml.loaddrupalData();
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
