<?php
require("./config.php");// or exit("No sql_config.php");
require("./get.php");// or exit("No get.php");

function curent_url(){
     return "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}

/*Take an url as it's first argument, or use the current url, search if a transcription is know, if yes print it as comment, else put a transcribe button.*/
function transcribe(){
  connect_db();
  $url=(func_num_args()==0)?current_url():func_get_arg(0);
  $row=get_line($url);
  if($row && $row['valid']>0){
    echo "<a href='help.php&url=$url' target='_transcribe'><img src='".$links['transcribe'].";?>' alt='Help transcribe this comic !'></a>";
  }else{
    echo "<!-- \n$title \n\n ".$row['transcription']."\n -->";
  }
  mysql_close();
?>