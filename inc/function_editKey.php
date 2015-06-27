<?php
// Edits Keywords to lower case - outcomments makes the first upper case and rest lower case
function editKey($input) {
	// $laenge = strlen($input);
	// $erstesZeichen = strtoupper(substr($input, 0, 1));
	// $rest = strtolower(substr($input, 1, ($laenge - 2)));
	// return $erstesZeichen.$rest;
	return strtolower($input);
}
?>
