﻿<?php 
//微信调用类

class weixin {
	private $token = "******";
	public $fromUsername;
	public $toUsername;
	public $keyword;
	private $MO_URL ='http://*******/';
	//构造函数
	public function __construct($postStr)
	{
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		$this->fromUsername = $postObj->FromUserName;
		$this->toUsername = $postObj->ToUserName;
		$this->keyword = trim($postObj->Content);
	
	}
	 
	//析构函数
	public function __destruct()
	{
		 
	}
	 
	private function checkSignature($signature,$timestamp,$nonce)
	{
		$token = $this->token;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);
		 
		if ($tmpStr == $signature) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 网址接入验证方法
	 * @signature — 微信加密签名
	 * @timestamp — 时间戳
	 * @nonce — 随机数
	 * @echostr — 随机字符串
	 * @return string
	 */
	public function valid($echoStr,$signature,$timestamp,$nonce)
	{
		//valid signature , option
		if ($this->checkSignature($signature,$timestamp,$nonce)) {
			return $echoStr;
		}
	}
	 
	
	public function load_keyword()
	{
		return $this->keyword;
	}
	 
	/**
	 * 创建XML格式的response
	 * @fromUsername - 消息发送方微信号
	 * @toUsername - 消息接收方微信号
	 * @contentStr - 需要发送的文本内容
	 * @return xml
	 */
	public function creat_xml_response($contentStr)
	{
		$msgType = "text";
		$time = time();
		$textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";
	
		
		$resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, $time, $msgType, $contentStr);
		return $resultStr;
	
	}
	
	/*
	 *监控端口数据获取 
	 * 
	 * 
	 * 
	 */
	
	public function get_port_check($text){
		$URI='get_port_status?itid='.$text;
		// 	echo $URI."<br>";
		echo $this->MO_URL ." url info <br>".$URI;
		$data_final=$this->request_by_curl($this->MO_URL,$URI);
		//$data_final=iconv('GB2312', 'UTF-8//ignore', $data_final);
		$data_str = " -- data str start";
		//echo var_dump($data_final)."var type";
		if ( $data_final == NULL || $data_final == ""){
			$data_str .="对不起，无查询结果";
		}else{
			// 	return $data_final;
			$data_str ="id: ".$data_final['item_id']." ,";
			$data_str .="名称: ".$data_final['item_name']." ,";
			$data_str .="主机ip: ".$data_final['item_host']." ,";
			$data_str .="端口: ".$data_final['item_port']." ,";
			$data_str .="状态(1成功0失败): ".$data_final['success']." ,";
			$data_str .= "更新时间: ".$data_final['check_time']." ,";
			if (isset($data_final['item_game_id']) && $data_final['item_game_id'] != '0'){//存在gameId
				// 		foreach ($data_final as $key => $val){
				// 			echo  "foreach..<br>"  ;
				// 			$data_str .= "游戏名称: ".$data_final['item_name']." ,";
				$data_str .= "游戏ID: ".$data_final['gameID']." ,";
				$data_str .= "当前在线/最大在线: ".$data_final['online']." 人,";
				$data_str .= "总人次: ".$data_final['personTime']." ";
				// 		}
				//$resultStr = $this->creat_xml_response($data_str);
				//return $resultStr;
			}
			//return $data_str;
		}
// 		echo $data_str." echo str data_str <br>";
// 		print $this->fromUsername;
// 		echo $this->toUsername;
		$resultStr = $this->creat_xml_response($data_str);
		return  $resultStr;
		// 	return $data_str='0';
	}
	
	private function request_by_curl($remote_server,$uri){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$remote_server.$uri);
		//  curl_setopt($ch,CURLOPT_POSTFIELDS,'datapost='.$post_string);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_USERAGENT,"HU-web");
		curl_setopt ($ch, CURLOPT_TIMEOUT, 10 );
		$data = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Errno'.curl_error($ch);
		}
		curl_close($ch);
		//return $data;
		//print_r(var_dump($data));
		return json_decode($data,true);
		//print_r($data);
	}
	
	/*
	 * 有道接口翻译
	 * @$value 需要翻译的文本
	 * @返回 xml
	 */
	
	public function language($value){
		$keyfrom = "zacharyhu"; //申请APIKEY时，填表的网站名称的内容  ；注意： $keyFrom 需要是【连续的英文、数字的组合】
		$apikey = "821845801";  //从有道申请的APIKEY
		$qurl = 'http://fanyi.youdao.com/fanyiapi.do?keyfrom='.$keyfrom.'&key='.$apikey.'&type=data&doctype=json&version=1.1&q='.$value;
		$content = @file_get_contents($qurl);
		$data_arr = json_decode($content,true);
		$explains='';
		foreach ($data_arr['basic']['explains'] as $val) {
			$explains .=$val.",";
		}
	
		$errorcode = $data_arr['errorCode'];
		$trans = '';
		//print_r($data_arr);
		if(isset($errorcode)){
			switch ($errorcode){
				case 0:
					$trans = $data_arr['translation']['0'];
					break;
				case 20:
					$trans = '要翻译的文本过长';
					break;
				case 30:
					$trans = '无法进行有效的翻译';
					break;
				case 40:
					$trans = '不支持的语言类型';
					break;
				case 50:
					$trans = '无效的key';
					break;
				default:
					$trans = '出现异常';
					break;
			}
		}
		$contentStr= '翻译结果:'.$trans.','.$explains.'' ;
		$resultStr = $this->creat_xml_response($contentStr);
		return $resultStr;
	}
	 
	/**
	 * 城市实时天气搜索
	 * @city 地区名称、电话区号、城市拼音
	 * @return xml
	 */
	public function inquire_city_weather($city)
	{
		$url = 'http://weather.china.xappengine.com/api?city='.urlencode($city);
		$result = file_get_contents($url);
// 		var_dump($result);
		$weather_arr=json_decode(($result),true);
// 		print_r($weather_arr);
		/*
		 * Array ( [pub] => 2013-01-29 16:00 
		 * [name] => 杭州 
		 * [wind] => Array ( [chill] => 57 [direction] => 0 [speed] => 2 ) 
		 * [astronomy] => Array ( [sunrise] => 6:50 [sunset] => 17:32 ) 
		 * [atmosphere] => Array ( [humidity] => 51 [visibility] => 3.73 [pressure] => 30.21 [rising] => 0 ) 
		 * [forecasts] => Array ( 
		 * 				[0] => Array ( [date] => 2013-01-29 
		 * 								[day] => 2 
		 *                              [code] => 31 
		 *                              [text] => 晴朗 
		 *                              [low] => 5 
		 *                              [high] => 15 
		 *                              [image_large] => http://weather.china.xappengine.com/static/w/img/d31.png 
		 *                              [image_small] => http://weather.china.xappengine.com/static/w/img/s31.png ) 
		 *              [1] => Array ( [date] => 2013-01-30 
		 *              				[day] => 3 
		 *              				[code] => 34 
		 *                              [text] => 晴朗
		 *                              [low] => 6 
		 *                              [high] => 18
		 *                              [image_large] => http://weather.china.xappengine.com/static/w/img/d34.png 
		 *                              [image_small] => http://weather.china.xappengine.com/static/w/img/s34.png ) 
		 *                       ) 
		 *       )
		 *  错误类型  { "error" : "CITY_NOT_FOUND", "message" : "City not found"} 
		 *       
		 *       
		 */

		  if ($weather_arr['error'] == NULL ){
			$contentTpl = "#城市: %s, 
					%s时发布的天气预报: 
					今天天气:%s,
					温度:最低%s℃  最高 %s℃,
					明天天气:%s,
					温度:最低%s℃  最高 %s℃,";
			$contentStr = sprintf($contentTpl, $city,$weather_arr['pub'],
					              $weather_arr['forecasts']['0']['text'],
					              $weather_arr['forecasts']['0']['low'],
					              $weather_arr['forecasts']['0']['high'],
					              $weather_arr['forecasts']['1']['text'],
					              $weather_arr['forecasts']['1']['low'],
					              $weather_arr['forecasts']['1']['high']);
		  }else{
		  	$contentStr = '城市气象查询失败';
		  }
			$resultStr = $this->creat_xml_response($contentStr);
			return $resultStr;
	}
	public function get_direct($text){
		$arr_pos = explode('-', $text,2);
		$begin = $arr_pos['0'];
		$end = $arr_pos['1'];
		if ($begin == NULL || $end ==NULL){
			$contentStr='请输入起点-终点  如   A-B';
		}else{
			$contentStr='起点  ：'.$begin.' ,终点： '.$end." ..";
			
		}
		$resultStr = $this->creat_xml_response($contentStr);
			return $resultStr;
	}
	
	
	
	
}




