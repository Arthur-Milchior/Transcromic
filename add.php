<?php
include("sql_config.php");// || exit("No sql_config.php");
include("get.php");// || exit("No get.php");
if(!isset($_POST["url"])|| $_POST["url"]=="")	exit( "No url given");
if(!isset($_POST["transcription"]))	exit( "No transcription given");

connect_db();

$url=$_POST["url"];
if(get_magic_quotes_gpc())$url=stripslashes($url);
$url=mysql_real_escape_string($url);

if(isset($_POST["title"]))$title=$_POST["title"];
 else $title="";
if(get_magic_quotes_gpc())$title=stripslashes($title);
$title=mysql_real_escape_string($title);

if(isset($_POST["email"]))$email=$_POST["email"];
 else $email="";
if(get_magic_quotes_gpc())$email=stripslashes($email);
$email=mysql_real_escape_string($email);

if(isset($_POST["author"]))$author=$_POST["author"];
 else $author="";
if(get_magic_quotes_gpc())$author=stripslashes($author);
$author=mysql_real_escape_string($author);

if(isset($_POST["message"]))$message=$_POST["message"];
 else $message="";
if(get_magic_quotes_gpc())$message=stripslashes($message);
$message=mysql_real_escape_string($message);

$transcription=$_POST["transcription"];
if(get_magic_quotes_gpc())$transcription=stripslashes($transcription);
$transcription=mysql_real_escape_string($transcription);



$row=get_line($url);

$exist=row_correct($row);//the transcription exist and was not rejected
 
if($exist){
  echo "<html><head><title>Sorry</title></head><body>Sorry, it seems that someone already submitted this comic. May be you want to keep a copy of your transcription, so if the last transcription was rejected you could submit your again.<br><h1>$title</h1><br><br>$transcription</body></html>";
  exit();
}


$query="INSERT INTO  `transcromic`.`transcription` (`url` ,`title` ,`author` ,`transcription` ,`valid`,`ip`)VALUES (  '$url',  '$title',  '$author',  '$transcription',  '1',".ip2long($_SERVER["REMOTE_ADDR"]).");";

mysql_query($query);//||exit("There was an error adding your quote to the database.");
mysql_close();
?>
<html> 
<head> 
	<title>Thank you </title> 
</head> 
<body> 
  Thank you, the comic's transcription was added. <br><p align="center">You can <a href="javascript:window.close();">close this window</a> if you want.</p> 
</body> 
</html>