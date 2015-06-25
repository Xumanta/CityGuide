<?php
// Suche nach Stichwörtern für GuideIDs
function editKey($input) {
	$laenge = strlen($input);
	$erstesZeichen = strtoupper(substr($input, 0, 1));
	$rest = strtolower(substr($input, 1, ($laenge - 2)));
	return $erstesZeichen.$rest;
}
?>