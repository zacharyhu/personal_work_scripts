<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Infos'=>array('index'),
	$model->l_game_id,
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameInfo', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameInfo', 'url'=>array('create')),
	array('label'=>'Update TvGpCfgGameInfo', 'url'=>array('update', 'id'=>$model->l_game_id)),
	array('label'=>'Delete TvGpCfgGameInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_game_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvGpCfgGameInfo', 'url'=>array('admin')),
);
?>

<h1>View TvGpCfgGameInfo #<?php echo $model->l_game_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'l_game_id',
		'l_status',
		'l_func_type',
		'l_game_type',
		'vc_game_name',
		'vc_game_desc',
		'vc_game_image',
		'l_date',
		'l_time',
		'l_rank_value',
		'vc_search_key',
		'l_cp_code',
	),
)); ?>
