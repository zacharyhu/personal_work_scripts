<?php 
$rel=file_get_contents('http://10.48.179.107/event501_top25.txt');
//print $rel;
$arr=explode(',', $rel);
//print_r($arr);
array_pop($arr);
$arr_end = array();
foreach ($arr as $k=>$v){
	$arr_v=explode('|', $v);
	array_push($arr_end,array($k + 1,$arr_v[0],$arr_v[1]));
}
$echostr_1='';
$echostr_2='';
foreach ($arr_end as $k=>$val){
    if ($k <= '12'){
	$echostr_1.= '<tr><td>'.$val['0'].'&nbsp;'.$val['1'].'&nbsp;'.$val['2'].'</td><tr>';
    }else{
    $echostr_2.= '<tr><td>'.$val['0'].'&nbsp;'.$val['1'].'&nbsp;'.$val['2'].'</td><tr>';	
    }
}
$center_str='      </table></td>
      <td width="52%"   align="center">	  
	  <table   border="0" cellspacing="0">';
$content_str=$echostr_1.$center_str.$echostr_2;
//$file_demo='/cron/event/hangma3_demo_h.jsp';
file_put_contents('/app/tomcat/webapps/gate_hdtv/hangma3.jsp', str_replace('td1stringtoreplace',$content_str,file_get_contents('/cron/event/hangma3_demo_h.jsp')));
file_put_contents('/app/tomcat/webapps/gate_castellan/hangma3.jsp', str_replace('td1stringtoreplace',$content_str,file_get_contents('/cron/event/hangma3_demo_c.jsp')));
file_put_contents('/app/tomcat/webapps/gate_nong/hangma3.jsp', str_replace('td1stringtoreplace',$content_str,file_get_contents('/cron/event/hangma3_demo_c.jsp')));
?>