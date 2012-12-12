package com.photon.phresco.uiconstants;

import java.io.File;

import java.io.IOException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.apache.commons.lang.NullArgumentException;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import com.photon.phresco.selenium.util.ScreenException;


public class ReadXMLFile {

	private  Element eElement;
	private Log log = LogFactory.getLog(getClass());
	private  final String phrsc = "src/main/resources/phresco-env-config.Xml";
	private  final String drupalblogdata = "src/main/resources/DrupalData.xml";
	private  final String constants = "src/main/resources/UIConstants.xml";
	private  final String UsrInfConst="src/main/resources/UserInfo.xml";
	
	/**
	 * Triggering loadPhrescoConstansts()method in ReadXMLFile Constructor
	 */
	public ReadXMLFile() throws ScreenException {
		log.info("@ReadXMLFile Constructor::loading *****PhrescoUIConstants******");
		loadPhrescoConstansts(phrsc);
	}
	
	/**
	 * Loading xml files through loadPhrescoConstansts()method
	 * @throws ScreenException
	 */
	
	public void loadPhrescoConstansts(String properties) throws ScreenException {
		
		try {
			File fXmlFile = new File(properties);
			DocumentBuilderFactory dbFactory = DocumentBuilderFactory
					.newInstance();
			DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
			Document doc = dBuilder.parse(fXmlFile);

			/*System.out.println("Root element :"
					+ doc.getDocumentElement().getNodeName());*/
			NodeList nList = doc.getElementsByTagName("environment");
			

			for (int temp = 0; temp < nList.getLength(); temp++) {

				Node nNode = nList.item(temp);
				if (nNode.getNodeType() == Node.ELEMENT_NODE) {

					eElement = (Element) nNode;

				}
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	/**
	 * Loading PhpData xml file through loadPhpData()method
	 * @throws ScreenException
	 */
	public void loaddrupalData() throws ScreenException {
    	loadPhrescoConstansts(drupalblogdata);
	}
	
	/**
	 * Loading UIConstants xml file through loadUIConstants()method
	 * @throws ScreenException
	 */
	public void loadUIConstants() throws ScreenException {
    	loadPhrescoConstansts(constants);
	}
	
	
	/**
	 * Loading UserIfoConstants xml file through loadUserInfoConstants()method
	 * @throws ScreenException
	 */
	public void loadUserInfoConstants() throws ScreenException {
		loadPhrescoConstansts(UsrInfConst);
		
	}
	
	
	/**
	 * Getting the xml values through getValue()method
	 * @throws ScreenException
	 */
	public String getValue(String elementName) {

		NodeList nlList = eElement.getElementsByTagName(elementName).item(0)
				.getChildNodes();
		Node nValue = (Node) nlList.item(0);		
		if(nValue==null){
			 return null; 
		  }

		return nValue.getNodeValue();
	}



	

	
	

}