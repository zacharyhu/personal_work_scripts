<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */

$this->breadcrumbs=array(
	'Tv Gp Logs Points'=>array('index'),
	$model->l_index,
);

$this->menu=array(
	array('label'=>'List TvGpLogsPoints', 'url'=>array('index')),
	array('label'=>'Create TvGpLogsPoints', 'url'=>array('create')),
	array('label'=>'Update TvGpLogsPoints', 'url'=>array('update', 'id'=>$model->l_index)),
	array('label'=>'Delete TvGpLogsPoints', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_index),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvGpLogsPoints', 'url'=>array('admin')),
);
?>

<h1>View TvGpLogsPoints #<?php echo $model->l_index; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'l_index',
		'l_user_id',
		'l_lobby_id',
		'l_source_id',
		'l_game_type',
		'l_game_id',
		'l_before_coin',
		'l_chg_coin',
		'l_coin',
		'l_date',
		'l_time',
	),
)); ?>
