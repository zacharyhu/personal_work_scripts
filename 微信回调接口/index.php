<?php

/**
*weixin.class.php 类中修改需要的方法
* 该 Demo 采用[指令分类]@[指令字符] 来实现多功能回复
* 
*/

include("weixin.class.php");
// header("Content-type: text/html; charset=utf-8");

/**
 * 首页网站接入验证，验证通过后该段代码可删除
 * 请先修改 weixin.class.php 文件中的 $token 为你在平台设置的token
 */
//  $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//  $signature = $_GET["signature"];
//  $timestamp = $_GET["timestamp"];
//  $nonce = $_GET["nonce"];
//  $echoStr = $_GET["echostr"];
//  $weixin = new weixin($postStr);
//  echo $weixin->valid($echoStr,$signature,$timestamp,$nonce);
  

$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
$weixin = new Weixin($postStr);
$keyword = $weixin->load_keyword();
$arr = explode("@",$keyword,"2");
$command = $arr[0];
$text = $arr[1];

if(!empty($command)){
	if ($command == "") {
			$text ="welcome!";//被关注时发送的欢迎词
			echo $weixin->creat_xml_response($weixin->fromUsername, $weixin->toUsername,$text);
			break;
	}elseif ($command == "天气"|| strtolower($command) == "w" ){
			if(!empty($text) && $text !=" "){
				echo $weixin->inquire_city_weather($text);
			}else{
				$text = "请输入(天气/W)@[地区名称、电话区号、城市拼音](如：天气@广州 或者  W@广州)查询该城市的实时天气";
				echo $weixin->creat_xml_response($weixin->fromUsername, $weixin->toUsername,$text);
				//echo "tianqi empty";
			}
	}elseif ($command == "翻译"|| strtolower($command) == "t" ){
			if(!empty($text) && $text !=" "){
				   //echo "  text :".$text;
					echo $weixin->language($text);
			}else{
					$text = "请输入(翻译/T)@[文字](如：翻译@天空 或者  T@天空)查询翻译结果";
					echo $weixin->creat_xml_response($weixin->fromUsername, $weixin->toUsername,$text);
			}
	}elseif ($command == "监控"|| strtolower($command) == "m" ){
			if (!empty($text) && is_numeric($text)){
				echo $weixin->get_port_check($text);
// 				echo  "here id gives".$text;
			}else{
				$text = "监控@[item id],常用: 监控@1025(杭州麻将)、监控@1028(双扣)";
				echo $weixin->creat_xml_response($fromUsername, $weixin->toUsername,$text);	
// 				echo "监控结果 - - ！";		
			}
	}elseif ($command == "路线"|| strtolower($command) == "l" ){
			if (!empty($text)){
				echo $weixin->get_direct($text);//寻路方法
// 				echo  "here id gives".$text;
			}else{
				$text = "监控@[item id],常用: 监控@1025(杭州麻将)、监控@1028(双扣)";
				echo $weixin->creat_xml_response($fromUsername, $weixin->toUsername,$text);	
// 				echo "监控结果 - - ！";		
			}
	}else{
			$text ="请输入1.(翻译/T)@[文字]使用翻译功能;
					2.(天气/W)@[城市、拼音]  查询城市天气";
			echo $text." hey here<br>";
			echo $weixin->creat_xml_response($text);
	}
}else{
	$text = "
			welcome here and pls enter msg like  command@text .
			";
	echo $weixin->creat_xml_response($text);
}


?>