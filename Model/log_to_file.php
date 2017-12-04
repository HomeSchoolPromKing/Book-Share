<!--
  Purpose: This file contains a function to write messages to a log file (currently in use on login page).
  Author: Kat Farley
  Date: 12/4/2017
 -->
 

<?php

function logToFile($filename, $msg)
{ 
	// open file
	$fd = fopen($filename, 'a');
	
	// append date/time to message
	$str = '[' . date('Y/m/d h:i:s', mktime()) . '] ' . $msg;	
	
	// write string
	fwrite($fd, $str . "\n");
	
	// close file
	fclose($fd);
}

?>