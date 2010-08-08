<?php
  //require("./sql_config.php");// or exit("No sql_config.php");
/*Return the array with the information on the transcription of this url, or false if it does not exist*/
function get_line($url){
  global $database;
  $query="SELECT * FROM  `".$database['prefix']."transcription` WHERE  `url` =  '$url'";
  $result=mysql_query($query);
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  return $row;
}
//the transcription exist and was not rejected
function row_correct($row){
  return ($row && $row['valid']>0);
}

function connect_db(){
  global $database;
  mysql_connect($database['server'],$database['username'],$database['password']);
  mysql_select_db($database['db']);
}
?>