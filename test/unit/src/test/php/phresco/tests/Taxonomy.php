<?php
/*	

Author by {phresco} QA Automation Team	

*/

require_once 'PHPUnit/Framework.php';
require_once 'DrupalBaseclass.php';


class Taxonomy extends DrupalBaseclass {
	
	
	function testCountTaxonomy(){
		$this->connect();
		$vid = array("vid" => 3);
		@$taxonomies = taxonomy_term_load_multiple(array() , $vid);
		$this->assertEquals(count($taxonomies),10);
	}
	
	function testSampleDrupal(){
		$this->connect();
		$vid = array("vid" => 2);
		$taxonomies = taxonomy_term_load_multiple(array() , $vid);
		$this->assertEquals(count($taxonomies),31);
	}
	
}
?>