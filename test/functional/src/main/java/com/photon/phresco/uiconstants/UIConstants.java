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

public class UIConstants {

	private Log log = LogFactory.getLog("Drupal UIConstants");

	public String signUpLink = "signuplink";
	public String userName = "username";
	public String emailField = "emailfield";
	public String passWord = "password";
	public String passWordLogin = "passwordlogin";
	public String confirmPassword = "confirmpassword";
	public String submitButton = "buttonclick";
	public String myAccount = "myaccount";
	public String logoButton = "logoff";
	public String login = "login";
	public String requestLink = "rlink";
	public String emailTextField = "etextfield";
	public String requestButton = "rbuttonclick";
	public String home = "home";
	public String contactus = "contactus";
	public String aboutus = "aboutus";
	public String searchProducts = "searchproducts";
	public String search = "search";
	public String movieAndMusics = "movieandmusics";
	public String mp3Player = "mp3player";
	public String tablets = "tablets";
	public String television = "television";
	public String videoGames = "videogames";
	public String accessories = "accessories";
	public String addToCart1 = "addtocart1";
	public String quantity1 = "quantity1";
	public String updateCart1 = "updatecart1";
	public String audioDevice = "audiodevice";
	public String addtoCart2 = "addtocart2";
	public String updateCart2 = "updatecart2";
	public String cameras = "cameras";
	public String addtoCart3 = "addtocart3";
	public String updateCart3 = "updatecart3";
	public String computers = "computers";
	public String addToCart4 = "addtocart4";
	public String updateCart4 = "updatecart4";
	public String mobilePhones = "mobilephones";
	public String addtoCart5 = "addtocart5";
	public String remove = "remove";
	public String remove1 = "remove1";
	public String updateCart5 = "updatecart5";
	public String checkout = "checkout";
	public String firstName = "firstname";
	public String lastName = "lastname";
	public String company = "company";
	public String streetAddress1 = "streetaddress1";
	public String streetAddress2 = "streetaddress2";
	public String city = "city";
	public String postelCode = "postelcode";
	public String billingAddCheck = "billingaddcheck";
	public String orderComm = "ordercomm";
	public String reviewOrder = "revieworder";
	public String checkOutSubmit = "checkoutsubmit";
	public String next = "next";
	public String next1 = "next1";
	public String select = "select";
	public String updateSelect = "updateselect";
	public String shopping = "shopping";
	public String removeCart = "removecart";
	public String addtoCart6 = "addtocart6";
	public String addtoCart7 = "addtocart7";
	public String addtoCart8 = "addtocart8";
	public String addtoCart9 = "addtocart9";
	public String addtoCart10 = "addtocart10";

	public String checkOutBtn = "checkOut";
	public String billInfoCheckBox = "billInfoCheckBox";
	public String billInfoStateXpath = "select_State";

	/**
	 * Reading the UIConstants xml environment through UIConstants() Constructor
	 */

	public UIConstants() {
		try {
			ReadXMLFile readXml = new ReadXMLFile();
			readXml.loadUIConstants();
			Field[] arrayOfField = this.getClass().getDeclaredFields();
			for (Field field : arrayOfField) {
				field.setAccessible(true);
				Object localObject = field.get(this);
				if (localObject instanceof String) {
					field.set(this, readXml.getValue((String) localObject));
				}
			}
		} catch (Exception localException) {
			log.info("Exception in Drupal UIConstants"
					+ localException.getMessage());
		}
	}

	public String getSignUpLink() {
		return signUpLink;
	}

	public void setSignUpLink(String signUpLink) {
		this.signUpLink = signUpLink;
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getEmailField() {
		return emailField;
	}

	public void setEmailField(String emailField) {
		this.emailField = emailField;
	}

	public String getPassWord() {
		return passWord;
	}

	public void setPassWord(String passWord) {
		this.passWord = passWord;
	}

	public String getPassWordLogin() {
		return passWordLogin;
	}

	public void setPassWordLogin(String passWordLogin) {
		this.passWordLogin = passWordLogin;
	}

	public String getConfirmPassword() {
		return confirmPassword;
	}

	public void setConfirmPassword(String confirmPassword) {
		this.confirmPassword = confirmPassword;
	}

	public String getSubmitButton() {
		return submitButton;
	}

	public void setSubmitButton(String submitButton) {
		this.submitButton = submitButton;
	}

	public String getMyAccount() {
		return myAccount;
	}

	public void setMyAccount(String myAccount) {
		this.myAccount = myAccount;
	}

	public String getLogoButton() {
		return logoButton;
	}

	public void setLogoButton(String logoButton) {
		this.logoButton = logoButton;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getRequestLink() {
		return requestLink;
	}

	public void setRequestLink(String requestLink) {
		this.requestLink = requestLink;
	}

	public String getEmailTextField() {
		return emailTextField;
	}

	public void setEmailTextField(String emailTextField) {
		this.emailTextField = emailTextField;
	}

	public String getRequestButton() {
		return requestButton;
	}

	public void setRequestButton(String requestButton) {
		this.requestButton = requestButton;
	}

	public String getHome() {
		return home;
	}

	public void setHome(String home) {
		this.home = home;
	}

	public String getContactus() {
		return contactus;
	}

	public void setContactus(String contactus) {
		this.contactus = contactus;
	}

	public String getAboutus() {
		return aboutus;
	}

	public void setAboutus(String aboutus) {
		this.aboutus = aboutus;
	}

	public String getSearchProducts() {
		return searchProducts;
	}

	public void setSearchProducts(String searchProducts) {
		this.searchProducts = searchProducts;
	}

	public String getSearch() {
		return search;
	}

	public void setSearch(String search) {
		this.search = search;
	}

	public String getMovieAndMusics() {
		return movieAndMusics;
	}

	public void setMovieAndMusics(String movieAndMusics) {
		this.movieAndMusics = movieAndMusics;
	}

	public String getMp3Player() {
		return mp3Player;
	}

	public void setMp3Player(String mp3Player) {
		this.mp3Player = mp3Player;
	}

	public String getTablets() {
		return tablets;
	}

	public void setTablets(String tablets) {
		this.tablets = tablets;
	}

	public String getTelevision() {
		return television;
	}

	public void setTelevision(String television) {
		this.television = television;
	}

	public String getVideoGames() {
		return videoGames;
	}

	public void setVideoGames(String videoGames) {
		this.videoGames = videoGames;
	}

	public String getAccessories() {
		return accessories;
	}

	public void setAccessories(String accessories) {
		this.accessories = accessories;
	}

	public String getAddToCart1() {
		return addToCart1;
	}

	public void setAddToCart1(String addToCart1) {
		this.addToCart1 = addToCart1;
	}

	public String getQuantity1() {
		return quantity1;
	}

	public void setQuantity1(String quantity1) {
		this.quantity1 = quantity1;
	}

	public String getUpdateCart1() {
		return updateCart1;
	}

	public void setUpdateCart1(String updateCart1) {
		this.updateCart1 = updateCart1;
	}

	public String getAudioDevice() {
		return audioDevice;
	}

	public void setAudioDevice(String audioDevice) {
		this.audioDevice = audioDevice;
	}

	public String getAddtoCart2() {
		return addtoCart2;
	}

	public void setAddtoCart2(String addtoCart2) {
		this.addtoCart2 = addtoCart2;
	}

	public String getUpdateCart2() {
		return updateCart2;
	}

	public void setUpdateCart2(String updateCart2) {
		this.updateCart2 = updateCart2;
	}

	public String getCameras() {
		return cameras;
	}

	public void setCameras(String cameras) {
		this.cameras = cameras;
	}

	public String getAddtoCart3() {
		return addtoCart3;
	}

	public void setAddtoCart3(String addtoCart3) {
		this.addtoCart3 = addtoCart3;
	}

	public String getUpdateCart3() {
		return updateCart3;
	}

	public void setUpdateCart3(String updateCart3) {
		this.updateCart3 = updateCart3;
	}

	public String getComputers() {
		return computers;
	}

	public void setComputers(String computers) {
		this.computers = computers;
	}

	public String getAddToCart4() {
		return addToCart4;
	}

	public void setAddToCart4(String addToCart4) {
		this.addToCart4 = addToCart4;
	}

	public String getUpdateCart4() {
		return updateCart4;
	}

	public void setUpdateCart4(String updateCart4) {
		this.updateCart4 = updateCart4;
	}

	public String getMobilePhones() {
		return mobilePhones;
	}

	public void setMobilePhones(String mobilePhones) {
		this.mobilePhones = mobilePhones;
	}

	public String getAddtoCart5() {
		return addtoCart5;
	}

	public void setAddtoCart5(String addtoCart5) {
		this.addtoCart5 = addtoCart5;
	}

	public String getRemove() {
		return remove;
	}

	public void setRemove(String remove) {
		this.remove = remove;
	}

	public String getRemove1() {
		return remove1;
	}

	public void setRemove1(String remove1) {
		this.remove1 = remove1;
	}

	public String getUpdateCart5() {
		return updateCart5;
	}

	public void setUpdateCart5(String updateCart5) {
		this.updateCart5 = updateCart5;
	}

	public String getCheckout() {
		return checkout;
	}

	public void setCheckout(String checkout) {
		this.checkout = checkout;
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public String getCompany() {
		return company;
	}

	public void setCompany(String company) {
		this.company = company;
	}

	public String getStreetAddress1() {
		return streetAddress1;
	}

	public void setStreetAddress1(String streetAddress1) {
		this.streetAddress1 = streetAddress1;
	}

	public String getStreetAddress2() {
		return streetAddress2;
	}

	public void setStreetAddress2(String streetAddress2) {
		this.streetAddress2 = streetAddress2;
	}

	public String getCity() {
		return city;
	}

	public void setCity(String city) {
		this.city = city;
	}

	public String getPostelCode() {
		return postelCode;
	}

	public void setPostelCode(String postelCode) {
		this.postelCode = postelCode;
	}

	public String getBillingAddCheck() {
		return billingAddCheck;
	}

	public void setBillingAddCheck(String billingAddCheck) {
		this.billingAddCheck = billingAddCheck;
	}

	public String getOrderComm() {
		return orderComm;
	}

	public void setOrderComm(String orderComm) {
		this.orderComm = orderComm;
	}

	public String getReviewOrder() {
		return reviewOrder;
	}

	public void setReviewOrder(String reviewOrder) {
		this.reviewOrder = reviewOrder;
	}

	public String getCheckOutSubmit() {
		return checkOutSubmit;
	}

	public void setCheckOutSubmit(String checkOutSubmit) {
		this.checkOutSubmit = checkOutSubmit;
	}

	public String getNext() {
		return next;
	}

	public void setNext(String next) {
		this.next = next;
	}

	public String getNext1() {
		return next1;
	}

	public void setNext1(String next1) {
		this.next1 = next1;
	}

	public String getSelect() {
		return select;
	}

	public void setSelect(String select) {
		this.select = select;
	}

	public String getUpdateSelect() {
		return updateSelect;
	}

	public void setUpdateSelect(String updateSelect) {
		this.updateSelect = updateSelect;
	}

	public String getShopping() {
		return shopping;
	}

	public void setShopping(String shopping) {
		this.shopping = shopping;
	}

	public String getRemoveCart() {
		return removeCart;
	}

	public void setRemoveCart(String removeCart) {
		this.removeCart = removeCart;
	}

	public String getAddtoCart6() {
		return addtoCart6;
	}

	public void setAddtoCart6(String addtoCart6) {
		this.addtoCart6 = addtoCart6;
	}

	public String getAddtoCart7() {
		return addtoCart7;
	}

	public void setAddtoCart7(String addtoCart7) {
		this.addtoCart7 = addtoCart7;
	}

	public String getAddtoCart8() {
		return addtoCart8;
	}

	public void setAddtoCart8(String addtoCart8) {
		this.addtoCart8 = addtoCart8;
	}

	public String getAddtoCart9() {
		return addtoCart9;
	}

	public void setAddtoCart9(String addtoCart9) {
		this.addtoCart9 = addtoCart9;
	}

	public String getAddtoCart10() {
		return addtoCart10;
	}

	public void setAddtoCart10(String addtoCart10) {
		this.addtoCart10 = addtoCart10;
	}

	public String getCheckOutBtn() {
		return checkOutBtn;
	}

	public void setCheckOutBtn(String checkOutBtn) {
		this.checkOutBtn = checkOutBtn;
	}

	public String getBillInfoCheckBox() {
		return billInfoCheckBox;
	}

	public void setBillInfoCheckBox(String billInfoCheckBox) {
		this.billInfoCheckBox = billInfoCheckBox;
	}

	public String getBillInfoStateXpath() {
		return billInfoStateXpath;
	}

	public void setBillInfoStateXpath(String billInfoStateXpath) {
		this.billInfoStateXpath = billInfoStateXpath;
	}

}
