<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'CP游戏信息'=>array('index'),
	$model->game_name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'列表游戏信息', 'url'=>array('index')),
	array('label'=>'新建游戏信息', 'url'=>array('create')),
	array('label'=>'查看游戏信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理游戏信息', 'url'=>array('admin')),
);
?>

<h1>更新游戏信息 <?php echo $model->game_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>