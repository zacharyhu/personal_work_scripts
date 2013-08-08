<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */

$this->breadcrumbs=array(
	'Tv Gp Logs Points'=>array('index'),
	$model->l_index=>array('view','id'=>$model->l_index),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvGpLogsPoints', 'url'=>array('index')),
	array('label'=>'Create TvGpLogsPoints', 'url'=>array('create')),
	array('label'=>'View TvGpLogsPoints', 'url'=>array('view', 'id'=>$model->l_index)),
	array('label'=>'Manage TvGpLogsPoints', 'url'=>array('admin')),
);
?>

<h1>Update TvGpLogsPoints <?php echo $model->l_index; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>