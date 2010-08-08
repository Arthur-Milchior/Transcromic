<?php 
require("./config.php");// or exit("No sql_config.php");
require("./get.php");// or exit("No get.php");
if(!isset($_GET["url"])|| $_GET==""){
	echo "No url given";
	exit();
}
$url=$_GET["url"];
if(get_magic_quotes_gpc())$url=stripslashes($url);
if(isset($_GET["title"]))$title=$_GET["title"];
 else $title="";
if(get_magic_quotes_gpc())$title=stripslashes($title);

connect_db();
$row=get_line($url);
mysql_close();
$exist=row_correct($row);//the transcription exist and was not rejected
 
if($exist){
  echo "Thank you, but this comic already exist.";
  exit();
}
?>
<html> 
<head> 
	<title>Transcribe a comic </title> 
	<meta http-equiv="cache-control" content="no-cache"> 
 
</head> 
<body> 
 
<table border="0" width="450" align="center"> 
	<tr> 
		<td>Thank you for wanting to transcribe this comic!  This helps me build a database of my comics, which makes searching for a specific comic a whole lot easier.  If you're not sure how the transcription process is meant to work, <a href="http://www.ohnorobot.com/transcriptionexplained.html" target="_explain">click here</a>.  Otherwise, please copy out the text in this comic into this text box!  Press return after each line of dialogue, and put a blank line after each panel.<h3>Transcription for the comic at <a href="<?php echo $url;?>"><?php echo $url;?></a>:</h3> 
<div align="center">


<form name="t" action="add.php" method="post"> 

<textarea cols="83" rows="10" name="transcription"></textarea><br> 
 
<p>Press return after each line of dialogue, and leave a blank line after each panel.<br> 
Format dialogue like <i>Character's name: What are the haps?</i><br> 
You don't have to add "PANEL 1:" labels.</p> 
<p>You can use these optional tags to add more to the transcription:<br> 
[[Scene description]] &bull; &lt;&lt;Sound effect&gt;&gt; &bull; {{Meta-comic information}}<br> 
(<a href="transcriptionexplained.pl#tags" target="_explain">click here for instructions on how to use these tags</a>)</p> 
<p>Finally, these fields are optional:</p> 
<table border="0" cellspacing="5"> 
	<tr> 
		<td>Title of comic:</td> 
		<td><input name="title" value ="<?php echo $title;?>" size="50" maxlength="255"></td> 
	</tr> 
	<tr> 
		<td>Your name:</td> 
		<td><input name="author" size="50"></td> 
	</tr> 
	<tr> 
		<td>Your email:</td> 
		<td><input name="email" size="50"></td> 
	</tr> 
	<tr> 
		<td>A personal message:</td> 
		<td><input name="message" maxlength="255" size="50"></td> 
	</tr> 
</table> 
<input type="submit" value="Submit transcription"> 
<input type="hidden" name="url" value="<?php  echo $url;?>"> 
</form></div> 


<p align="center">You can <a href="javascript:window.close();">close this window</a> if you want.</p> 
		</td> 
	</tr> 
</table> 
</body> 
</html>