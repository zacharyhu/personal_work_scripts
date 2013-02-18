<?php
$gate=$_GET['gate'];
$stbid=$_GET['stbid'];
if($gate=='hotel'){
   $fp=fopen('./vistlog/hotel.log','a');
   if(!$fp){
     echo "open file failed..";
   }else{
   fwrite($fp,$stbid." login at ".date("Y-m-d H:i:s"."\n"));
   }
   fclose($fp);
}

?>
