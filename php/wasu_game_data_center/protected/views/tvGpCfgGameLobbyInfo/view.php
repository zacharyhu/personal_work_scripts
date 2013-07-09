<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $model TvGpCfgGameLobbyInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos'=>array('index'),
	$model->l_lobby_id,
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameLobbyInfo', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameLobbyInfo', 'url'=>array('create')),
	array('label'=>'Update TvGpCfgGameLobbyInfo', 'url'=>array('update', 'id'=>$model->l_lobby_id)),
	array('label'=>'Delete TvGpCfgGameLobbyInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_lobby_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvGpCfgGameLobbyInfo', 'url'=>array('admin')),
);
?>

<h1>View TvGpCfgGameLobbyInfo #<?php echo $model->l_lobby_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'l_lobby_id',
		'vc_org_name',
		'vc_recharge_ipaddr',
		'l_recharge_port',
		'l_payment',
		'l_day_money',
		'l_month_money',
		'vc_business_id',
		'l_status',
		'vc_filter_gameid',
		'vc_order_id',
	),
)); ?>
