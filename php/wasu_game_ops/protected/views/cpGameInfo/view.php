<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'Cp游戏信息'=>array('index'),
	$model->game_name,
);

$this->menu=array(
	array('label'=>'List CpGameInfo', 'url'=>array('index')),
	array('label'=>'Create CpGameInfo', 'url'=>array('create')),
	array('label'=>'Update CpGameInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpGameInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpGameInfo', 'url'=>array('admin')),
);
?>

<h1>查看游戏详情 #<?php echo $model->game_name; ?></h1>


<?php 

/**
 * 轮训获取lobbyname
 * 
 */

$lobbyname = '|';
foreach (explode(',',$model->game_lobby) as $lobbyid){
	$lobbyname .= GpLobbyCfg::model()->getLobbyName($lobbyid).' |';
}


    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'cp_id',
        array('label'=>'厂商','type'=>'raw','value'=>CHtml::link(CHtml::encode($model->cpName->cp_name),array('cpBaseInfo/View','id'=>$model->cp_id))),
		'game_name',
		'game_id',
		'game_cp_code',
		'game_action_id',
		'game_desc',
		array('label'=>'状态','value'=>GpGameStatusCfg::model()->getStatusName($model->game_status)),
  		array('label'=>'大厅名称','value'=>$lobbyname),
		'game_server_ip',
		'game_server_port',
	),
)); 


// print $lobbyname;

?>

