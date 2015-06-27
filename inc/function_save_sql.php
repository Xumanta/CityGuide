<?php
	// Search for Bad 
	function save_sql($input) {
	
		$searcher = array();
		$searcher[0] = '/Ü/';
		$searcher[1] = '/ü/';
		$searcher[2] = '/Ä/';
		$searcher[3] = '/ä/';
		$searcher[4] = '/Ö/';
		$searcher[5] = '/ö/';
		$searcher[6] = '/ß/';

		$replacer = array();
		$replacer[0] = '&Uuml;';
		$replacer[1] = '&uuml;';
		$replacer[2] = '&Auml;';
		$replacer[3] = '&auml;';
		$replacer[4] = '&Ouml;';
		$replacer[5] = '&ouml;';
		$replacer[6] = '&szlig;';
	
		$erg = addslashes(preg_replace($searcher, $replacer, $input));
		return $erg;
	}
?>
