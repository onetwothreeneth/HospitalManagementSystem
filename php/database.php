<?php  
$conn = mysqli_connect("localhost","root","","hospitalmanagementsystem");
$s = "SELECT * FROM ";
$se = " SET ";
$o = " or ";
$a = " and ";
$w = " WHERE "; 
$j = " INNER JOIN "; 
$i = "INSERT INTO "; 
$u = "UPDATE "; 
$d = "DELETE FROM "; 
$o = " ORDER BY "; 
$l = " LIMIT "; 
$ds = " DESC "; 
$ss = " ASC "; 
function clean($string){ 
	global $conn;
	return $conn->escape_string($string);
} 
function filters($string){ 
	global $conn;
	$post = $_POST[$string];
	return $conn->escape_string($post);
}

function get($col,$sql){
	global $conn;
	$q = $conn->query($sql);
	$n = mysqli_num_rows($q); 
	if($n<=0){
		return 0;
	} else {
		while($r = mysqli_fetch_array($q)){
			return $r[$col];
		}
	}
}

function fetch($sql){
	global $conn;
	$q = $conn->query($sql);
	$n = mysqli_num_rows($q); 
	$rs=array();
	if($n<=0){
		return 0;
	} else {
		while($r = mysqli_fetch_object($q)){
			$rs[] = $r;
		} return $rs;
	}
	//foreach ($asd as $v){ }
}
function fetched($sql){
	global $conn;
	$q = $conn->query($sql);
	$n = mysqli_num_rows($q); 
	$rs=array();
	if($n<=0){
		return 0;
	} else {
		while($r = mysqli_fetch_object($q)){
			$rs[] = $r;
		} return $rs;
	}
	//foreach ($asd as $v){ }
}

function fetchs($sql){
	global $conn;
	$q = $conn->query($sql);
	$n = mysqli_num_rows($q); 
	$rs=array();
	if($n<=0){
		return 0;
	} else {
		while($r = mysqli_fetch_array($q)){
			$rs[] = $r;
		} return json_encode($rs);
	}
	//foreach ($asd as $v){ }
}

function counts($sql){
	global $conn;
	$q = $conn->query($sql);
	return $n = mysqli_num_rows($q);  
}

function udi($sql){
	global $conn;
	$q = $conn->query($sql);
	if($q){
		return true;
	} else {
		return false;
	} 
}  

function to($url){
	global $conn;
	return header("location:$url");
}  
function has($var){
	if(isset($var)){
		return $var;
	}
} 
function out(){ 
	@$id = $_SESSION['id'];
	session_destroy();
	session_unset();
}

 