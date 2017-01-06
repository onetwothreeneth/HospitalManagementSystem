<?php
include "database.php";
session_start();
$id = @$_SESSION['id'];
	if(isset($id)){ 
		//nothing happens 
	} else { 
		to("login.php"); 
	}