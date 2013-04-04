<?php
/*
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
/*
Author by {phresco} QA Automation Team	

*/

require_once 'PHPUnit/Framework.php';
require_once 'DrupalBaseclass.php';


class Node extends DrupalBaseclass {
		
	function testNodeType(){
		$this->connect();
		$nodeType = node_load(1);
		$this->assertEquals("product", $nodeType->type);
	}
		
	function testNodeTitle(){
		$this->connect();
		$node = node_load(1); // node_load(17) problem in data
		$title = node_page_title($node);
		$this->assertEquals('LG Electronics 42PW350 3D Plasma HDTV ', $title);
	}
	 function testLastChanged(){
		$this->connect();
		$changed = node_last_changed(1);
		$this->assertEquals('1322291491', $changed);
	} 
}
?>