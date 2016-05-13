<?php
	$dblocation='localhost';
	$dbname='dedphp';
	$dbuser='root';
	$dbpass='';
	$dbcnx=mysqli_connect($dblocation, $dbuser, $dbpass);
	if(!$dbcnx){
		exit('Error connect');
	}
	$dbsel=mysqli_select_db($dbcnx, $dbname);
	if(!$dbcnx){
		exit('Error use DB');
		}
	mysqli_query($dbcnx, "set names 'UTF-8'");