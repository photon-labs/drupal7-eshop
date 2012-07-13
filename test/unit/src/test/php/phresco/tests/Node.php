<?php
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