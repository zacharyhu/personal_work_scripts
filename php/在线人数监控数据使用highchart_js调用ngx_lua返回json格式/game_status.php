
<?php require  'find_data.php'; 
$arr_online=array();//定义在线人数数组
$arr_time_line=array();//定义时间轴
//print_r($arr_result);//打印获取到的find_data

//  $arr_itemNeed=array('1025','1026','1028','1037');//定义需要的itemID
 $arr_online_data=array();
//--开关  foreach ($arr_itemNeed as $itemNeed){
// 	echo $itemNeed."------<br>";
	foreach ($arr_result as $k=>$every_game_data){//组合数据
// 		echo "item_id -- ".$every_game_data['item_id']."-----<br>";
//--开关 		if ($every_game_data['item_id']==$itemNeed){
// 			echo "打印online数组  <br>";
// 			print_r($every_game_data['cur_online']);
// 			echo "print itemNeed<br>".$itemNeed."--end  <br>";
			$arr_time_line=$every_game_data['check_time'];
			$arr_one_data=array();
			 $arr_one_data['name']=$every_game_data['item_id'];
			 $arr_one_data['data']=$every_game_data['cur_online'];
			array_push($arr_online, $arr_one_data);
		}
//--开关		}
		
//--开关	}
//  echo "------------------------<br>";
//  print_r($arr_online);
$seris_data=json_encode($arr_online);
// var_dump($json_data);
// print $seris_data;
 
$categories_data=json_encode($arr_time_line);
// print $categories_data;


$arr_render_data=array(
		"title_text"=>"'游戏实时在线人数'",
		"title_sub"=>"'实时在线统计'",
		"xaxis"=>"",
		"yaxis"=>"'在线人数'",

);

// echo $arr_render_data["title_text"];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Refresh" content="120">
<title>游戏实时在线人数</title>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">

$(function () {
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container',
				type: 'line'
			},
			title: {
				//text: 'TEST!!!!!!TITLE'
				text: <?php echo $arr_render_data["title_text"];?>
			},
			subtitle: {
				text: <?php echo $arr_render_data['title_sub'];?>
			},
			xAxis: {
				//categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				categories: <?php print $categories_data;?>
			},
			yAxis: {
				title: {
					text: <?php echo $arr_render_data['yaxis'];?>
				}
			},
			tooltip: {
				enabled: true,
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +': '+ this.y +'人';
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			//series: [{
				//name: 'Tokyo-2',
				//data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
			//}, {
				//name: 'London',
				//data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			//}]
			series: <?php print $seris_data;?>
		});
	});

})

</script>


</head>
<body>
<script src="./js/highcharts.js"></script>
<script src="./js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 600px; margin: 0 auto"></div>

</body>
</html>



