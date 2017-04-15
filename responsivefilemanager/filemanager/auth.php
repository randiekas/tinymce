<?php
if (session_id() == '') session_start();
DEFINE('BASEPATH',"sdfds");
require("../../../application/config/database.php");
$connection = mysql_connect($db["default"]["hostname"],$db["default"]["username"],$db["default"]["password"]) or die(mysql_error());
mysql_select_db($db["default"]["database"]) or die(mysql_error());
$query = mysql_fetch_array(mysql_query("select * from user where username='".$_POST["username"]."' and password='".md5($_POST["password"])."'"));
$row = $query;
if($row["id_profile"])
{
	$_SESSION["userid"] = $row["id"];
	$_SESSION["id_profile"] = $row["id_profile"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["password"] = $row["password"];
	$_SESSION["personaldir"] = md5($row["id"]);
	
	 if(!is_dir('../source/users/'.$_SESSION["personaldir"].'/'))
		 {
			 mkdir('../source/users/'.$_SESSION["personaldir"].'/', 0777);
		 }
	echo "success";
}else{
	echo "failed";
}
	