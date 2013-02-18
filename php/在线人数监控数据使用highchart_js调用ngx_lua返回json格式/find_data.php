<?php
define("MO_URL", 'http://****/');
//php curl 方法
/**
 * Curl版本
 * 使用方法：
 * $post_string = "app=request&version=beta";
 * request_by_curl('http://host/restServer.php',$post_string);
 */
function request_by_curl($remote_server){
 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$remote_server);
//  curl_setopt($ch,CURLOPT_POSTFIELDS,'datapost='.$post_string);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch,CURLOPT_USERAGENT,"HU-web");//ngx_lua接口验证用
 curl_setopt ($ch, CURLOPT_TIMEOUT, 10 );
 $data = curl_exec($ch);
 if (curl_errno($ch)) {
 	echo 'Errno'.curl_error($ch);
 }
 curl_close($ch);
//  return $data;
//  echo $data;
// var_dump($data);
// echo "<br>";
// var_dump($data);
// echo "start json decode<br>";
// return $data;
 return json_decode($data,true);
// var_dump($data_arr);
// print_r($data_arr);
// return $data_arr;
}
 
$URI='find_data';
$remote_server=MO_URL.$URI;
// echo $remote_server;
$arr_result=request_by_curl($remote_server);
// var_dump($arr_result);
//categories=check_time,item_id=name,cur_online=name
// json_decode
// print_r($arr_result);

?>